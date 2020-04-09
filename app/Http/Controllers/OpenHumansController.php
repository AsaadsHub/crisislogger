<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class OpenHumansController extends Controller {


	public function authenticate() {

		// create link for openhumans authentication
		$clientId = config('openHumans.clientId');
		$url = "https://www.openhumans.org/direct-sharing/projects/oauth2/authorize/?client_id=$clientId&response_type=code";

		// redirect user to openhumans
		return redirect($url);
	}


	public function redirect(Request $request) {
		// get code from openhumans
		$code = $request->code;
		$origin = $request->origin;
		$redirectUri = config('openHumans.redirectUri');
		$clientId = config('openHumans.clientId');
		$clientSecret = config('openHumans.clientSecret');

		// send post request to openhumans to get access token
		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', 'https://www.openhumans.org/oauth2/token/', [
			'form_params' => [
				'grant_type' => 'authorization_code',
				'code' => $code,
				'client_id' => $clientId,
				'client_secret' => $clientSecret,
				'redirect_uri' => $redirectUri,
			]
		]);

		if ($response->getStatusCode() == 200) {
			$response = $response->getBody();
			$response = json_decode($response);

			// save access token in user
			User::where('id', Auth::id())->update([
				'access_token' => $response->access_token,
				'refresh_token' => $response->refresh_token,
			]);

			echo 'success';
		} else {
			echo 'fail';
		}

	}

	public function refreshToken() {
		// get user refresh token
		$user = User::where('id', Auth::id())->first();
		$refreshToken = $user->refresh_token;

		$clientId = config('openHumans.clientId');
		$clientSecret = config('openHumans.clientSecret');

		// send post request to openhumans to refresh token
		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', 'https://www.openhumans.org/oauth2/token/', [
			'form_params' => [
				'grant_type' => 'refresh_token',
				'refresh_token' => $refreshToken,
				'client_id' => $clientId,
				'client_secret' => $clientSecret,
			]
		]);

		if ($response->getStatusCode() == 200) {
			$response = $response->getBody();
			$response = json_decode($response);

			// save new access token in user
			User::where('id', Auth::id())->update([
				'access_token' => $response->access_token,
				'refresh_token' => $response->refresh_token,
			]);

			echo 'success';
		} else {
			echo 'fail';
		}

	}

	public function getProjectMembers() {
		// get user access token
		$user = User::where('id', Auth::id())->first();
		$accessToken = $user->access_token;

		// send post request to openhumans to get project members
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', "https://www.openhumans.org/api/direct-sharing/project/exchange-member/?access_token=$accessToken");

		if ($response->getStatusCode() == 200) {
			$response = $response->getBody();
			$response = json_decode($response);

			dd($response);

		} else {
			echo 'fail';
		}

	}

	public function getProjectInformation() {
		// get user access token
		$user = User::where('id', Auth::id())->first();
		$accessToken = $user->access_token;

		// send post request to openhumans to get project information
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', " https://www.openhumans.org/api/direct-sharing/project/?access_token=$accessToken");

		if ($response->getStatusCode() == 200) {
			$response = $response->getBody();
			$response = json_decode($response);

			dd($response);

		} else {
			echo 'fail';
		}

	}

}
