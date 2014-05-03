<?php
/**
 * DML
 */

class dml
{
	/**
	 * Connect Fizz to the DB
	 */
	public static function connect() {
		global $CFG;

		try {
			\SkylarK\Fizz\FizzConfig::setDB($CFG->db_uri, $CFG->db_user, $CFG->db_pass);
		}
		catch (PDOException $e) {
			die($e->getMessage());
			exit(0);
		}
	}
}