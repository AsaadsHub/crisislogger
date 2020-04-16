<?php

namespace App;

use Carbon\CarbonImmutable;
use Google\ApiCore\ApiException;
use Google\ApiCore\ValidationException;
use Google\Cloud\Speech\V1\RecognitionAudio;
use Google\Cloud\Speech\V1\RecognitionConfig;
use Google\Cloud\Speech\V1\RecognitionConfig\AudioEncoding;
use Google\Cloud\Speech\V1\SpeechClient;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Storage;
use Eloquent;

/**
 * Class Transcription
 * @package App
 * @mixin Eloquent
 * @property int id
 * @property int user_id
 * @property int upload_id
 * @property string text
 * @property CarbonImmutable created_at
 * @property CarbonImmutable updated_at
 */
class Transcription extends Model
{

    /**
     * Transcribe an audio file to text.
     * @param Upload $upload
     * @return Transcription
     * @throws ApiException
     * @throws ValidationException
     * @throws FileNotFoundException
     */
    public static function audio(Upload $upload){
        $user = Auth::user();

        $content = Storage::disk('gcs')->get($upload->name);

        # set string as audio content
        $audio = (new RecognitionAudio())
          ->setUri('gs://crisislogger_uploads/'.$upload->name);


        # The audio file's encoding, sample rate and language
        $config = new RecognitionConfig([
             'encoding' => AudioEncoding::LINEAR16,
            // 'sample_rate_hertz' => 44100,
            'language_code' => 'en-US'
        ]);

        # Instantiates a client
        $client = new SpeechClient();

        # Detects speech in the audio file
//        $google_response = $client->recognize($config, $audio);

        // create the asyncronous recognize operation
        $operation = $client->longRunningRecognize($config, $audio);
        $operation->pollUntilComplete();

        $response = '';
        if ($operation->operationSucceeded()) {
            $google_response = $operation->getResult();

            # Print most likely transcription
            foreach ($google_response->getResults() as $result) {
                $alternatives = $result->getAlternatives();
                $mostLikely = $alternatives[0];
                $transcript = $mostLikely->getTranscript();
                $response .= $transcript;
            }
        }else {
            print_r($operation->getError());
        }

        $client->close();

        // If not empty, save into transcriptions table
        $transcription = new Transcription();
        $transcription->upload_id = $upload->id;
        if($user) $transcription->user_id = $user->id;
        $transcription->text = $response;
        $transcription->save();

        return $transcription;
    }

    /**
     * @param Upload $upload
     * @return Transcription
     * @throws ApiException
     * @throws FileNotFoundException
     * @throws ValidationException
     */
    public static function video(Upload $upload){
        // First, convert the video to an audio file.
        $audio_upload = $upload->convertToAudio();
        // Call the transcribe audio now to do the transcribing.
        return self::audio($audio_upload);
    }


    public static function text(Upload $upload) {
        $user = Auth::user();

        // If not empty, save into transcriptions table
        $transcription = new Transcription();
        $transcription->upload_id = $upload->id;
        if ($user) $transcription->user_id = $user->id;
        $transcription->text = $upload->text;
        $transcription->save();

        return $transcription;
    }

}
