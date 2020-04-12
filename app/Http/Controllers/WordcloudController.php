<?php

namespace App\Http\Controllers;

use App\Transcription;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;

class WordcloudController extends Controller
{
    /**
     * @param string $text
     * @return array
     */
    private function generateWords(string $text){
        $words = explode(' ', $text);
        return array_count_values($words);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function generate(){
        $user = Auth::user();

        // Get a list of transcriptions
        /** @var Transcription[] $transcriptions */
        $transcriptions = $user->transcriptions()->get();
        $words = [];

        // Loop through the transcriptions and get a list of words
        foreach($transcriptions as $transcription){
            $words[$transcription->id] = $this->generateWords($transcription->text);
        }

        return response()->json($words, Response::HTTP_OK);
    }
}
