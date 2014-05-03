<?php
/**
 * Main HipBot lib
 */

function set_config($key, $val) {
	$config = models\Config::find(array(
		"key" => $key
	));

	if (empty($config)) {
		$config = new models\Config();
		$config->key = $key;
		$config->value = $val;
		$config->create();
		return;
	}

	$config = array_pop($config);
	$config->update(array(
		"value" => $val
	));
}