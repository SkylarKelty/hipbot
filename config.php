<?php
/**
 * All files require config.php
 */

global $CFG, $DB, $SESSION;

define("CORE_VERSION", 2014050300);

$CFG = new \stdClass();
$CFG->dirroot = dirname(__FILE__);
$CFG->libdir = $CFG->dirroot . "/lib";

$SESSION = new \stdClass();

// Special file, created at deploy time. Contains API key.
require_once($CFG->dirroot . "/data.php");

require_once($CFG->libdir . "/autoloader.php");
require_once($CFG->libdir . "/hipbot.php");

$DB = new dml();
$DB->connect();

\models\Config::setup();