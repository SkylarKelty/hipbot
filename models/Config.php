<?php
/**
 * HipBot config model
 */

namespace models;

class Config extends \SkylarK\Fizz\Fizz
{
	public $key;
	public $value;

	/**
	 * Returns the table name
	 */
	public static function tablename() {
		return "config";
	}

	/**
	 * Setup hook
	 */
	public static function setup() {
		global $CFG;

		$objs = static::all();
		foreach ($objs as $obj) {
			$name = $obj->key;
			$CFG->$name = $obj->value;
		}
	}

	/**
	 * Do the migration.
	 */
	public static function migrate() {
		$object = new \SkylarK\Fizz\Util\FizzMigrate("config");
		$object->addField("key", "varchar(125)");
		$object->addField("value", "text");
		$object->commit();
	}
}