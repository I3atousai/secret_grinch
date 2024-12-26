<?php

require_once "../model/DB.php";
require_once "../model/Logged_Box.php";
require_once "../model/UALB.php";
require_once "../model/Users.php";
require_once "../model/Notifications.php";

$connect = DB::connect();


// all boxes older than a day

$sql = "SELECT *, DATEDIFF(logged_box.date_create, CURRENT_TIMESTAMP) as diff FROM logged_box WHERE DATEDIFF(logged_box.date_create, CURRENT_TIMESTAMP) < 0;";

try {
    $req = $connect->prepare($sql);
$req->execute();
} catch (\Throwable $th) {
    echo $th->getMessage();
}

$all_boxes = $req->fetchAll();


echo $this_many_boxes = count($all_boxes);
echo '<br>';


for ($i=0; $i < $this_many_boxes; $i++) { 
    $id = $all_boxes[$i]['id'];
    $join_link = $all_boxes[$i]['join_link'];
    $sql = "SELECT COUNT(name) FROM logged_box JOIN users_and_logged_boxes WHERE 
users_and_logged_boxes.box_id = logged_box.id AND users_and_logged_boxes.box_id = $id";

try {
    $req = $connect->prepare($sql);
    $req->execute();
    $user_count = $req->fetch();

    // echo "<pre>";
    // print_r($user_count) ;
    // echo "<pre/>";
    

    if ($all_boxes[$i]['diff'] == -25) { 

        $get = [
            "ualb.user_id",
            "ualb.box_id",
            "ualb.id"
        ];
        $tables = ["users_and_logged_boxes as ualb"];
        $params = [
            ["ualb.box_id", "=", $all_boxes[$i]["id"], "system"]
        ];
           $box_users = UALB::query(get:$get, tables:$tables, params:$params);
            for ($u=0; $u < count($box_users); $u++) { 
                Notifications::add([
                    'box_id' => $all_boxes[$i]['id'],
                    "text" => "Коробка ". $all_boxes[$i]['name'] ." Удалится через 4 дня",
                    "user_id" => $box_users[$u]['user_id']
                ]);
            }

    }

// Code below deletes boxes older than 30 days
    if ($all_boxes[$i]['diff'] <= -30) {
         $params_ualb = [
            ["box_id", "=", $boxes_arr[$i]["id"]]
            ];
        UALB::delete($params_ualb);
            $params_ualb = [
            ["box_id", "=", $boxes_arr[$i]["id"]]
            ];
            Notifications::delete($params_ualb);
        UBW::delete($params_ualb);
            $params_box = [
            ["id", "=", $id]
            ];
        LB::delete($params_box);
        unlink("../joinbox_files/join_" . $join_link);
    }
// Code above deletes empty boxes older than 30 days


// Code below deletes empty boxes older than 1 day
    if ($user_count['COUNT(name)'] == 0) {
        $params_box = [
            ["id", "=", $id]
        ];
      // echo("../joinbox_files/join_" . $join_link);
       unlink("../joinbox_files/join_" . $join_link);
       LB::delete($params_box);
    }
// Code above deletes empty boxes older than 1 day
    echo '<br>';
} catch (\Throwable $th) {
    echo $th->getMessage();
}
}


$sql = "SELECT id, profile_pic_path from users WHERE profile_pic_path != '../PFPictures/def_avatar.jpg';";
$req = $connect->prepare($sql);
$req->execute();  
$all_users_with_pfp = $req->fetchAll();

$this_many_users = count($all_users_with_pfp);
$used_pictures = ['../PFPictures/def_avatar.jpg'];
for ($i=0; $i < $this_many_users; $i++) { 
    $used_pictures[] = $all_users_with_pfp[$i]['profile_pic_path'];
}
print_r($used_pictures);



//code below deletes unused profile pictures
// Set the current working directory
$directory = '../PFPictures/';
 
// Initialize filecount variable
$filecount = 0;
 
$files2 = glob( $directory ."*" );
 
if( $files2 ) {
    $filecount = count($files2);
}
 
$pictures_in_folder = count($files2);
for ($i=0; $i < $pictures_in_folder; $i++) { 
    // if ($files2) {
    //     # code...
    // }
    $comp_result = array_search($files2[$i], $used_pictures);
    if( $comp_result === false ) {
    unlink($files2[$i]);
    }
   // echo"search";
    echo"<br>";
}


//code below deletes old password recovery files 
// Set the current working directory
$directory = '../password_recovery/';
// Initialize filecount variable
$filecount = 0;
$files2 = glob( $directory ."*.php"  );
if( $files2 ) {
    $filecount = count($files2);
}
 
echo "this many files" . $files_in_folder = count($files2) . "<br>";
for ($i=0; $i < $files_in_folder; $i++) { 
        unlink($files2[$i]);
} 

Notifications::delete(params:[
    ["status", "=", 1]
]);




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