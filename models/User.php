<?php
/**
 * User class
 */

namespace models;

class User extends \SkylarK\Fizz\Fizz
{
	/** The user's id */
	public $id;

	/** The user's actual name */
	public $name;

	/** The name we should use in @mention's */
	public $mention;

	/**
	 * Create a user from a message
	 */
	public static function from_message($message) {
		$user = new static();
		$user->name = $message->from->name;
		$user->mention = $message->from->mention_name;

		return $user;
	}

	/**
	 * Returns the table name
	 */
	public static function tablename() {
		return "users";
	}

	/**
	 * Do the migration.
	 */
	public static function migrate() {
		$object = new \SkylarK\Fizz\Util\FizzMigrate("users");
		$object->addField("id", "int(11)");
		$object->addField("name", "varchar(255)");
		$object->addField("mention", "varchar(255)");
		$object->commit();
	}
}