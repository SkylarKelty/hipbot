<?php
/**
 * HipBot autoloader
 */

require_once($CFG->dirroot . "/vendor/autoload.php");

spl_autoload_register(function ($class_name) {
	$classpath = explode('\\', $class_name);

	if (count($classpath) == 1) {
		$filename = dirname(__FILE__) . "/$class_name.php";
		if (file_exists($filename)) {
			@include($filename);
		}
		return;
	}

	$type = $classpath[0];
	$name = $classpath[1];

	$filename = dirname(__FILE__) . "/../$type/$name.php";
	if (file_exists($filename)) {
		@include($filename);
	}
});