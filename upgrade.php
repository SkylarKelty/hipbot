<?php
/**
 * Upgrade page
 */

require_once(dirname(__FILE__) . "/config.php");

if (!isset($CFG->version)) {
	die("Not installed!");
}

if ($CFG->version >= CORE_VERSION) {
	die("No upgrade required!");
}

models\Config::migrate();
models\Reminder::migrate();
models\User::migrate();

set_config("version", CORE_VERSION);