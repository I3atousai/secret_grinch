<?php 

require_once "../model/UBW.php";
session_start();



$box_id = $_POST['box_id'];
$user_id = $_SESSION['auth']['logged_user_id'];
$wish = $_POST['wish'];



$wish_data = ["box_id"=> $box_id,
                 "usr_id"=> $user_id,
                 "wish"=> $wish];
try {
      echo UBW::delete(  [
            ["box_id", "=", $box_id, "AND"],
            ["usr_id", "=", $user_id]
            ]);
    echo UBW::add($wish_data);
     header('Location: ../php/usr_page.php');
} catch (\Throwable $th) {
       header('Location: ../php/usr_page.php');
}
?>