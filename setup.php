<?
/**
 * Setup page
 */

require_once(dirname(__FILE__) . "/config.php");

?>

<html>
<head>
  <script src="https://www.hipchat.com/atlassian-connect/all.js"></script>
  <link rel="stylesheet" href="https://www.hipchat.com/atlassian-connect/all.css">
</head>
<body>
<?php

auth::authenticate();

$url = "https://api.hipchat.com/v2/room/{$CFG->roomid}/webhook";
$body = json_encode(array(
	"url" => "http://54.72.78.4/hooks/message.php",
	"pattern" => "*",
	"event" => "room_message",
	"name" => "hipbot_message_hook"
));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,            $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST,           1);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $body); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain')); 

curl_exec($ch);

?>
</body>
</html>