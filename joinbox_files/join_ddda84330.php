<?php 
session_start();
require_once "../model/UALB.php";   
require_once "../model/Logged_Box.php";   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/joinbox_template.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Main page</title>
</head>
<body>
    <div class="background">
        <?php include_once('../php/header.php') ?>
        <?php  
        $box_id_to_add =7;
$join_hash ="2y10DNXW56e8tGr255mqim34nUaHb2ipBVH0DX3m66nFTe579kTXOy";


if (!isset($_SESSION['auth'])) {
            echo "Только зарегистрированные пользлватели могут присоеденяться к коробкам";
        }
        else {
            if ($_GET['join_hash'] != $join_hash) {
                echo "Ссылка повреждена";
            }
            else {
                if (LB::get_one($box_id_to_add)['closed_or_oped'] == 0) {
                    echo "<h2 class=\"box_error\">Коробка закрыта, обратитесь к владельцу ссылки</h2>";
                }
                else {
                    $get = [
                        "ualb.box_id",
                        "ualb.user_id"
                    ];
                    $tables = ["users_and_logged_boxes as ualb"];
                    $params = [
                        ["ualb.user_id", "=", $_SESSION['auth']['logged_user_id'], "system", "AND"],
                        ["ualb.box_id", "=", $box_id_to_add, "system"]
                    ];
        
                    if (count(UALB::query(get:$get, tables:$tables, params:$params)) >= 1) {
                        echo "пользователь уже в коробке";
                    }
                    else {
                        
                        $data_user_added = [
                            "user_id"=> $_SESSION['auth']['logged_user_id'],
                            "box_id"=> $box_id_to_add
                        ];
                        UALB::add($data_user_added);  
                    }
                }
            }
        }
        ?>
        <?php include_once('../php/footer.php') ;
        unset($_SESSION['sql_del'])?>
    </div>
</body>
</html>