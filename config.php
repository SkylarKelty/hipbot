<?php
/**
 * All files require config.php
 */

global $CFG;

$CFG = new \stdClass();
$CFG->dirroot = dirname(__FILE__);
$CFG->libdir = $CFG->dirroot . "/lib";

// Special file, created at deploy time. Contains API key.
require_once($CFG->dirroot . "/data.php");

require_once($CFG->libdir . "/autoloader.php");