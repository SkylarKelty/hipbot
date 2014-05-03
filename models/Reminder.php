<?php
/**
 * HipBot reminder model
 */

namespace models;

class Reminder extends \SkylarK\Fizz\Fizz
{
	const STATUS_NEW = 1;
	const STATUS_OLD = 2;

	public $id;
	public $user;
	public $time;
	public $message;
	public $status;

	/**
	 * Match a message
	 */
	public static function match($user, $message) {
		$regex = "/remind me in ([0-9]+) (.*) to (.*)/i";
		preg_match($regex, $message, $matches);

		if (count($matches) == 4) {
			// Yay!
			$time = $matches[1];
			$time_period = $matches[2];
			$data = $matches[3];

			$obj = new static();
			$obj->user = $user->id;
			$obj->time = strtotime(time() . " + $time $time_period");
			$obj->message = $data;
			$obj->status = Reminder::STATUS_NEW;
			$obj->create();
		}
	}

	/**
	 * Returns the table name
	 */
	public static function tablename() {
		return "reminders";
	}

	/**
	 * Do the migration.
	 */
	public static function migrate() {
		$object = new \SkylarK\Fizz\Util\FizzMigrate("reminders");
		$object->addField("id", "int(11)");
		$object->addField("user", "int(11)");
		$object->addField("time", "int(11)");
		$object->addField("message", "text");
		$object->addField("status", "int(1)");
		$object->commit();
		$object->setPrimary("id");
		$object->commit();
	}
}