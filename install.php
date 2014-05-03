<?php
/**
 * Setup page
 */

require_once(dirname(__FILE__) . "/config.php");

if (isset($CFG->version) && $CFG->version) {
	die("Already installed!");
}

print "Registering webhook";

$url = "https://api.hipchat.com/v2/room/{$CFG->roomid}/webhook";
$body = json_encode(array(
	"url" => "http://{$CFG->wwwroot}/hooks/message.php",
	"pattern" => "",
	"event" => "room_message",
	"name" => "hipbot_message_hook"
));

request::post($url, $body);

print "Creating tables...";

models\Config::migrate();
models\Reminder::migrate();
models\User::migrate();

set_config("version", CORE_VERSION);