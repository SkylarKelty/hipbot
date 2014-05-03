<?php
/**
 * Basic request helper.
 */

class request
{
	/**
	 * Obtain an oAuth token
	 */
	private static obtain_token() {
		global $CFG;

		$url = "https://api.hipchat.com/v2/oauth/token";

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,            $url);
		curl_setopt($ch, CURLOPT_USERPWD,        $CFG->oauth_id . ":" . $CFG->oauth_secret);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST,           1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,     array(
			"grant_type" => "client_credentials",
			"scope" => "admin_room"
		));
		curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: application/x-www-form-urlencoded')); 

		$body = curl_exec($ch);
		$data = json_decode($body);

		if (isset($data->access_token)) {
			return $data->access_token;
		}
	}

	/**
	 * Signs a request
	 */
	private static sign() {
		global $SESSION;

		if (empty($SESSION->access_token)) {
			$token = self::obtain_token();
			if (!$token) {
				return false;
			}

			$SESSION->access_token = $token;
		}

		return array(
			"Authorization: Bearer {$SESSION->access_token}"
		);
	}

	/**
	 * Send a POST request.
	 */
	public static post($url, $body = '') {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,            $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST,           1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,     $body);

		$headers = array_merge(self::sign(), array('Content-Type: text/plain'));
		curl_setopt($ch, CURLOPT_HTTPHEADER,     $headers);

		return curl_exec($ch);
	}
}