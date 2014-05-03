<?php
/**
 * All files require config.php
 */

global $CFG;

$CFG = new \stdClass();
$CFG->dirroot = dirname(__FILE__);
$CFG->libdir = $CFG->dirroot . "/lib";

require_once($CFG->libdir . "/autoloader.php");
