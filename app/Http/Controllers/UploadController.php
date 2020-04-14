<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Texts;
use App\Transcription;
use App\Upload;
use App\User;
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
        $email_address = session()->get('user-email');
        if (!Auth::user() && !isset($email_address))
        {
            \App::abort(404, 'The user information not found'); // need to prevent if user doesn't enter email address
        }
        $file_extension = $request->file('data')->guessExtension();
        $file = Storage::disk('gcs')->putFile('', $request->file('data'));
        // Store the file name in the session in case the user decides to sign up.
        Session::put('filename', $file);
        // Save it in the database
        $upload = new Upload();
        $upload->name = $file;
        $upload->share = $request->share;
        $upload->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        $user = Auth::user();
        if (!isset($user) && isset($email_address))
        {
            $user = new User();
            $user->setAttribute('email', $email_address);
            $user->setAttribute('name', 'unnamed');// assign temp user.
            $user->setAttribute('password', \Hash::make(time()));// assign temp password.
            $user->save();
            session()->put('temp_user_id', $user->getKey());
        }
        if($request->has('voice')){
            $upload->voice = $request->voice;
        }
        else
        {
            $upload->voice = 'parent';
        }
        $user->uploads()->save($upload);
        // Check and see if the user needs to be redirected to the questionnaire page (if sharing)
        if($upload->contribute_to_science){
            session()->put('need-to-question-air', 1);
        }
        $redirect = route('capture-create-account');
        if (auth()->check() && $upload->contribute_to_science)
        {
            $redirect = route('questionnaire');
        }
        // If the are contributing to science, we will transcribe the message and save it
        if($upload->contribute_to_science){
            if($file_extension == 'wav' || $file_extension == 'mp3'){
                $transcription = Transcription::audio($upload);
            } else {
                $transcription = Transcription::video($upload);
            }
            Session::put('transcription', $transcription->id);
        }
        session()->forget('user-email');
        $response = [
            'message' => 'File uploaded successfully.',
            'file' => $file,
            'redirect' => $redirect,
            'transcription' => $transcription->id ?? null
        ];
        return response()->json($response, Response::HTTP_OK);
    }
    public function saveText(UploadRequest $request)
    {
        $email_address = session()->get('user-email');
        if (!Auth::user() && !isset($email_address))
        {
            \App::abort(404, 'The user information not found'); // need to prevent if user doesn't enter email address
        }
        // Save it in the database
        $upload = new Texts();
        $upload->text = $request->data;
        $upload->share = $request->share;
        $upload->contribute_to_science = $request->contribute;
        // If we are logged in, save that user's id
        $user = Auth::user();
        if (!isset($user) && isset($email_address))
        {
            $user = new User();
            $user->setAttribute('email', $email_address);
            $user->setAttribute('name', 'unnamed');// assign temp user.
            $user->setAttribute('password', \Hash::make(time()));// assign temp password.
            $user->save();
            session()->put('temp_user_id', $user->getKey());
        }
        if($request->has('voice')){
            $upload->voice = $request->voice;
        }
        else
        {
            $upload->voice = 'parent';
        }
        $user->texts()->save($upload);
        // Check and see if the user needs to be redirected to the questionnaire page (if sharing)
        //if(!$upload->share){
        if($upload->contribute_to_science){
            session()->put('need-to-question-air', 1);
        }
        $redirect = route('capture-create-account');
        if (auth()->check() && $upload->contribute_to_science)
        {
            $redirect = route('questionnaire');
        }
        // If the are contributing to science, we will transcribe the message and save it
        session()->forget('user-email');
        $response = [
            'message' => 'ONE MORE STEP: Enter your email address on the next screen for us to log your text.',
            'redirect' => $redirect,
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
