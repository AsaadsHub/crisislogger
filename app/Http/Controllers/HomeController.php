<?php

namespace App\Http\Controllers;

use App\Transcription;
use App\Upload;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the dashboard. If there are files to add to a user, add them.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(){
        $user = Auth::user();

        // Check and see if there are any files in the session waiting to be added to a user
        if(Session::has('filename')){
            $upload = Upload::where('name', Session::get('filename'))->first();
            if($upload){
                $upload->user_id = $user->id;
                $upload->save();
            }
            // Clear the session
            Session::remove('filename');
        }

        // Check and see if there are any transcription in the session waiting to be added to a user
        if(Session::has('transcription')){
            $transcription = Transcription::where('id', Session::get('transcription'))->first();
            if($transcription){
                $transcription->user_id = $user->id;
                $transcription->save();
            }
            // Clear the session
            Session::remove('transcription');
        }

        return view('pages.dashboard');
    }

}
