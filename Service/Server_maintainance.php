<?php

require_once "../model/DB.php";
require_once "../model/Logged_Box.php";
require_once "../model/UALB.php";

$connect = DB::connect();

$all_boxes = LB::get_all();
echo $this_many_boxes = count($all_boxes);
echo '<br>';

for ($i=0; $i < $this_many_boxes; $i++) { 
    $id = $all_boxes[$i]['id'];
    $sql = "SELECT name, COUNT(name) FROM logged_box JOIN users_and_logged_boxes WHERE 
users_and_logged_boxes.box_id = logged_box.id AND users_and_logged_boxes.box_id = $id AND 
DATEDIFF(logged_box.date_create, CURRENT_TIMESTAMP) < 0;";
echo $sql;

    echo '<br>';
    echo '<br>';
try {
    $req = $connect->prepare($sql);
    $req->execute();
    print_r($req->fetch()) ;
    echo '<br>';
} catch (\Throwable $th) {
    echo $th->getMessage();
}
    
}






$connect = null;
?>

<!-- THIS SEARCHES FOR BOXES OLDER THAN 1 DAY -->
<!-- SELECT name FROM logged_box WHERE DATEDIFF(date_create, CURRENT_TIMESTAMP) < 0; -->


<!-- sql below searches for sql with id of $box_to_target that is older than 1 day
    
 SELECT COUNT(name) FROM logged_box JOIN users_and_logged_boxes WHERE 
 users_and_logged_boxes.box_id = logged_box.id AND
 users_and_logged_boxes.box_id = $box_to_target AND 
 DATEDIFF(logged_box.date_create, CURRENT_TIMESTAMP) < 0; 
-->


<!-- This one displays tha name too
SELECT name, COUNT(name) FROM logged_box JOIN users_and_logged_boxes WHERE 
users_and_logged_boxes.box_id = logged_box.id AND users_and_logged_boxes.box_id = 17 AND 
DATEDIFF(logged_box.date_create, CURRENT_TIMESTAMP) < 0; 

-->