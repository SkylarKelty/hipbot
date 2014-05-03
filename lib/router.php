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
		// Is this to set a reminder?
		if (strpos($message, "remind me")) {
			models\Reminder::match($user, $message);
		}
	}
}