<?php 

require_once "../model/Logged_Box.php";
session_start();

$id = $_POST['id'];
$state = $_POST['state'];

log($state);
echo LB::update(
    ['closed_or_oped' => $state],
    [
        ['id', '=', $id, 'system']
    ]
);
http_response_code(200);
echo json_encode([
    'message' => "значение успешно обновилось",
]);


?>