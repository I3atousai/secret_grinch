<?php 
session_start();
require_once "../model/Notifications.php";

 if ($_POST['noted'] == true) {
    Notifications::update(
        ['status' => 1],
        [
            ['user_id', '=', $_SESSION['auth']['logged_user_id'], 'value']
        ] );

 }
?>