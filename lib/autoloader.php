<?php
/**
 * HipBot autoloader
 */

spl_autoload_register(function ($class_name) {
	$classpath = explode('\\', $class_name);

	if (count($classpath) == 1) {
		$filename = dirname(__FILE__) . "/$class_name.php";
		if (file_exists($filename)) {
			@include($filename);
		}
		return;
	}

	$parts = explode('_', $classpath[0]);
	$type = $parts[0];
	$name = $parts[1];
	$class = $parts[2];

	$filename = dirname(__FILE__) . "/../$type/$name/$class.php";
	if (file_exists($filename)) {
		@include($filename);
	}
});