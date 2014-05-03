<?php
/**
 * Main message router
 */

class router
{
	/**
	 * Route a message
	 */
	public static function recieve_message($user, $message) {
		error_log("Recieved Message from {$user->name}: $message.");
	}
}