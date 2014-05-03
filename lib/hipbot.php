<?php
/**
 * Main HipBot lib
 */

function set_config($key, $val) {
	$config = new models\Config();
	$config->key = $key;
	$config->value = $val;

	if (empty(models\Config::find(array("key" => $key)))) {
		$config->create();
	} else {
		$config->update();
	}
}