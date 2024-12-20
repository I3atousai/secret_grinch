<?php
session_start();

require_once '../model/Users.php';

$file = $_FILES['file'];

$type = $file['type'];
$type = explode('/', $type)[1];
$new_name = "PHOTO-" . rand(0, 999999) . ".$type";
$new_path = "../PFPictures/$new_name";

if (move_uploaded_file($file["tmp_name"], $new_path)) {
      $row_count = Users::update(
            ['profile_pic_path' => $new_path],
            [
                ['id', '=', $_SESSION['auth']['logged_user_id'], 'value']
            ]
        );
        if ($row_count != 0) {
            $_SESSION['auth']['profile_picture_path'] = $new_path;
        }
    }
    exit();


