<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;
use Auth;

class QuestionnaireController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request){
        $user = Auth::user();
        $request->offsetUnset('_token');
        $fields = json_encode($request->all(), JSON_UNESCAPED_SLASHES);

        $questionnaire = new Questionnaire();
        $questionnaire->fields = $fields;

        if($user) $questionnaire->user_id = $user->id;
        $questionnaire->save();

        return redirect()->route('capture-create-account')->with('questionnaire_success', 'Thank you for your input!');
    }
}
