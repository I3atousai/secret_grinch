<?php 

require_once "../model/UALB.php";
session_start();

$user_id = $_POST['user_id'];
$box_id = $_POST['box_id'];


      $params_ualb_user = [
      ["box_id", "=", $box_id, "AND"],
      ["user_id", "=", $user_id]
      ];
       UALB::delete($params_ualb_user);
?>