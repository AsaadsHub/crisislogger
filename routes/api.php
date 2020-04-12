<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('upload', 'UploadController@upload')->name('upload');
Route::post('save-text', 'UploadController@saveText')->name('save-text');

Route::middleware('auth')->group(function(){

    Route::prefix('user')->group(function(){
        Route::post('update', 'UserController@update')->name('user_update');
        Route::post('change_password', 'UserController@changePassword')->name('user_change_password');
    });

    Route::post('word_cloud', 'WordcloudController@generate');

});
Route::prefix('transcribe')->group(function(){
   Route::get('audio/{name}', 'TranscribeController@transcribeAudio');
});

//Route::post('questionnaire', 'QuestionnaireController@upload')->name('questionnaire_form_upload');
