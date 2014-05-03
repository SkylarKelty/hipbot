<?php
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
?>
</body>
</html>