<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
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
//		return;
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

			return $this->getUserData($response->access_token, $response->refresh_token);

		} else {
			\Session::flash('authorization_success', 'Something went wrong, please try again later');
			return view('pages.index');
		}

	}

	public function getUserData($access_token, $refresh_token) {
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', 'https://www.openhumans.org/api/direct-sharing/project/exchange-member/?access_token=' . $access_token);

		if ($response->getStatusCode() == 200) {
			$response = $response->getBody();
			$response = json_decode($response);
			$openhumans_project_member_id = $response->project_member_id;

			// get user is registered or not
			$user = User::where('openhumans_project_member_id', $openhumans_project_member_id)->first();

			if ($user === null) {
				// create user
				$user = new User();
				$user->openhumans_project_member_id = $openhumans_project_member_id;
				$user->openhumans_access_token = $access_token;
				$user->openhumans_refresh_token = $refresh_token;

				$user->save();
				Auth::login($user);
			} else {
				// update existing user
				$user->update([
					'openhumans_project_member_id' => $openhumans_project_member_id,
					'openhumans_access_token' => $access_token,
					'openhumans_refresh_token' => $refresh_token,
				]);
				Auth::login($user);
			}

			\Session::flash('authorization_success', 'Successfully authorized');
//			return view('pages.index');
			return redirect(RouteServiceProvider::HOME);
		} else {
			\Session::flash('authorization_success', 'Something went wrong, please try again later');
			return view('pages.index');
		}

	}

	public function refreshToken() {
		// get user refresh token
		$user = User::where('id', Auth::id())->first();
		$refreshToken = $user->openhumans_refresh_token;

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
				'openhumans_access_token' => $response->access_token,
				'openhumans_refresh_token' => $response->refresh_token,
			]);

			echo 'success';
		} else {
			echo 'fail';
		}

	}

	public function getProjectMembers() {
		// get user access token
		$user = User::where('id', Auth::id())->first();
		$accessToken = $user->openhumans_access_token;

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
		$accessToken = $user->openhumans_access_token;

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
