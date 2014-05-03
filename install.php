<?php
/**
 * Setup page
 */

require_once(dirname(__FILE__) . "/config.php");

if (isset($CFG->installed) && $CFG->installed) {
	die("Already installed!");
}

/*
$url = "https://api.hipchat.com/v2/room/{$CFG->roomid}/webhook";
$body = json_encode(array(
	"url" => "http://54.72.78.4/hooks/message.php",
	"pattern" => "",
	"event" => "room_message",
	"name" => "hipbot_message_hook"
));

request::post($url, $body);
*/

print "Creating tables...";

models\Config::migrate();

$object = new \SkylarK\Fizz\Util\FizzMigrate("users");
$object->addField("id", "int(11)");
$object->addField("name", "varchar(255)");
$object->addField("mention", "varchar(255)");
$object->commit();

$object = new \SkylarK\Fizz\Util\FizzMigrate("reminders");
$object->addField("id", "int(11)");
$object->addField("user", "int(11)");
$object->addField("time", "int(11)");
$object->addField("message", "text");
$object->addField("status", "int(1)");
$object->commit();
