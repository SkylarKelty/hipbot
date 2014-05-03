<?php
/**
 * Auth library
 */

class auth
{
	public static function authenticate() {
		global $CFG;

		$url = "https://api.hipchat.com/v2/room?auth_token={$CFG->token}";
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

		curl_exec($c);
	}
}