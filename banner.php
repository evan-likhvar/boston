<?php

include_once "./Repositories/Connection.php";
include_once "./Repositories/LogRequest.php";
include_once "./Repositories/DB.php";

$connection = Connection::getPdo();
$data = LogRequest::getRequestData();

$record = DB::getRecord($connection, $data);

if (!$record) {
    DB::addRecord($connection, $data);
} else {
    DB::updateRecord($connection, $record);
}

$im = imagecreatetruecolor(500, 50);
$text_color = imagecolorallocate($im, 233, 233, 91);
imagestring($im, 1, 5, 5,  'Some banner', $text_color);
header('Content-Type: image/jpeg');
imagejpeg($im);
imagedestroy($im);
