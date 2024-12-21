<?php

require_once "../model/DB.php";
require_once "../model/Logged_Box.php";
require_once "../model/UALB.php";
require_once "../model/Users.php";

$connect = DB::connect();

$all_boxes = LB::get_all();


echo $this_many_boxes = count($all_boxes);
echo '<br>';


for ($i=0; $i < $this_many_boxes; $i++) { 
    $id = $all_boxes[$i]['id'];
    $sql = "SELECT logged_box.id, logged_box.join_link, name, COUNT(name) FROM logged_box JOIN users_and_logged_boxes WHERE 
users_and_logged_boxes.box_id = logged_box.id AND users_and_logged_boxes.box_id = $id AND 
DATEDIFF(logged_box.date_create, CURRENT_TIMESTAMP) < 0;";
//echo $sql;

    echo '<br>';
    echo '<br>';
try {
    $req = $connect->prepare($sql);
    $req->execute();

    $name_and_user_count = $req->fetch();
    echo "<pre>";
    print_r($name_and_user_count) ;
    echo "<pre/>";
    

// Code below deletes empty boxes older than 1 day
    if ($name_and_user_count['COUNT(name)'] == 0) {
        $params_box = [
            ["id", "=", $name_and_user_count["id"]]
        ];
        
        unlink("../joinbox_files/join_" . $name_and_user_count['join_link']);
        LB::delete($params_box);
    }
// Code above deletes empty boxes older than 1 day
    echo '<br>';
} catch (\Throwable $th) {
    echo $th->getMessage();
}
}


// $get = [
//     'name',
//     "id",
//      "profile_pic_path"
// ];
// $params = [
//     ["profile_pic_path", "!=", "../PFPictures/def_avatar.jpg", "system"]
// ];
// try {
//     $all_users_with_pfp = Users::query(get:$get, params:$params, unique:true) ;
// } catch (\Throwable $th) {
//     echo $th->getMessage();
// }

$sql = "SELECT id, profile_pic_path from users WHERE profile_pic_path != '../PFPictures/def_avatar.jpg';";
$req = $connect->prepare($sql);
$req->execute();  
$all_users_with_pfp = $req->fetchAll();

echo $this_many_users = count($all_users_with_pfp);
$used_pictures = ['../PFPictures/def_avatar.jpg'];
for ($i=0; $i < $this_many_users; $i++) { 
    $used_pictures[] = $all_users_with_pfp[$i]['profile_pic_path'];
}
print_r($used_pictures);


// Set the current working directory
$directory = '../PFPictures/';
 
// Initialize filecount variable
$filecount = 0;
 
$files2 = glob( $directory ."*" );
 
if( $files2 ) {
    $filecount = count($files2);
}
 
print_r($files2) ;
$pictures_in_folder = count($files2);
for ($i=0; $i < $pictures_in_folder; $i++) { 
    // if ($files2) {
    //     # code...
    // }
    $comp_result = array_search($files2[$i], $used_pictures);
    if( $comp_result === false ) {
        // unlink(file to unlink);
echo "false";
    }
    echo"search";
    echo"<br>";
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