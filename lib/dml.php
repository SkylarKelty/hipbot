<?php
/**
 * DML
 */

class dml
{
	/** Our own store of the PDO object */
	private $_pdo;

	/**
	 * Connect Fizz to the DB
	 */
	public function connect() {
		global $CFG;

		try {
			\SkylarK\Fizz\FizzConfig::setDB($CFG->db_uri, $CFG->db_user, $CFG->db_pass);
		}
		catch (PDOException $e) {
			die($e->getMessage());
			exit(0);
		}

		$this->_pdo = \SkylarK\Fizz\FizzConfig::getDB();
	}
}