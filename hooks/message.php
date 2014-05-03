<?php
/**
 * Message Hook
 */

require_once(dirname(__FILE__) . "/../config.php");

$data = file_get_contents("php://input");
$data = json_decode($data);

$item = $data->item;
$message = $item->message;

$user = user::from_message($message);
$message = $message->message;

router::recieve_message($user, $message);
