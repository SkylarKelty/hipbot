<?php
/**
 * Message Hook
 */

$data = file_get_contents("php://input");
$data = json_decode($data);

$item = $data->item;
$message = $item->message;

$user = user::from_message($message);
$message = $message->message;

router::recieve_message($user, $message);
