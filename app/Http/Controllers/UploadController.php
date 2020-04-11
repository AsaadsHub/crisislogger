<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Transcription;
use App\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Storage;
use Auth;

class UploadController extends Controller
{
    /**
     * @param UploadRequest $request
     * @return JsonResponse
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function upload(UploadRequest $request){
        $file_extension = $request->file('data')->getClientOriginalExtension();
        $file = Storage::disk('gcs')->putFile('', $request->file('data'));

        // Store the file name in the session in case the user decides to sign up.
        Session::put('filename', $file);
        // Save it in the database
        $upload = new Upload();
        $upload->name = $file;
        $upload->share = $request->share;
        $upload->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        if(Auth::user()) $upload->user_id = Auth::user()->id;

        if($request->has('voice')){
            $upload->voice = $request->voice;
        }
        else
        {
            $upload->voice = 'parent';
        }
        
        $upload->save();

        // Check and see if the user needs to be redirected to the questionnaire page (if sharing)
        //if(!$upload->share){
            $redirect = route('capture-create-account');
        //}

        // If the are contributing to science, we will transcribe the message and save it
        if($upload->contribute_to_science){
           if($file_extension == 'wav' || $file_extension == 'mp3'){
                $transcription = Transcription::audio($upload);
            }
            else
            {
               $transcription = Transcription::video($upload);
            }
            
            Session::put('transcription', $transcription->id);
        }

        $response = [
            'message' => 'File uploaded successfully. ONE MORE STEP: Enter your email address on the next screen for us to log your recording.',
            'file' => $file,
            'redirect' => $redirect,
            'transcription' => $transcription->id ?? null
        ];
        return response()->json($response, Response::HTTP_OK);
    }

}
