<?php
/**
 * HipBot reminder model
 */

namespace models;

class Reminder extends \SkylarK\Fizz\Fizz
{
	public $id;
	public $user;
	public $time;
	public $message;
	public $status;

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