<?php
session_start();

require_once '../model/Users.php';


$name = $_POST['name'];
$row_count = Users::update(
    ['name' => $name],
    [
        ['id', '=', $_SESSION['auth']['logged_user_id'], 'value']
    ]
);
if ($row_count != 0) {
    $_SESSION['auth']['nick'] = $name;
}
    
    exit();


