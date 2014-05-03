<?php
/**
 * User class
 */

class user
{
	/** The user's actual name */
	public $name;

	/** The name we should use in @mention's */
	public $nick;

	/**
	 * Create a user from a message
	 */
	public static function from_message($message) {
		$user = new static();
		$user->name = $message->from->name;
		$user->nick = $message->from->mention_name;

		return $user;
	}
}