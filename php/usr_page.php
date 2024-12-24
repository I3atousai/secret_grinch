<?php
    session_start();

    if (isset($_POST["submit_exit"])) {
        header("Location:../php/index.php");
        unset($_SESSION['auth']);
    }

    require_once "../model/Users.php";
    require_once "../model/Logged_Box.php";
    require_once "../model/UALB.php";
    require_once "../model/Notifications.php";
    require_once "../model/UBW.php";
    require_once "../Service/Guard.php";
    Guard::only_user();
    $nick = $_SESSION['auth']["nick"];
    $usr_id = $_SESSION['auth']["logged_user_id"];

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/usr_page.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Моя Страница</title>
</head>
<body>
<div class="background">
        <?php include_once('../php/header.php');
        // get notifications
        $unseen_notifications = Notifications::query( get: ['note.text'], 
        tables:['notifications as note'] ,
        params:[
            // ['status', '=', 0, 'system', "AND",], 
            ['user_id', '=', $_SESSION['auth']['logged_user_id'], 'value'] ] );
        ?>
        <main >
            <div id="snow-globe">

                <div id="usr_desc">
                    <button id="notification_button" class="emoji_button" onclick="toggleVisibility(9999)" type="button">
                        <?php 
                        if (count($unseen_notifications) > 0) { ?>
                        <span id="attention"></span>
                         <?php } ?>
                        🔔</button>
                        <div id="box_users_9999" class="usr_list">
                            <?php 
                            if (count($unseen_notifications) > 0){
                                for ($i=0; $i < count($unseen_notifications); $i++) { ?>
                                    <p><?php echo $unseen_notifications[$i]['text'] ?></p>
                                    <hr>
                                 <?php }  
                            }else { ?>
                            <p>Нет новых уведомлений</p>
                            <?php } ?>
                        </div>
                    <input type="file" class="hidden" id="avatar_input">
                    <img id="PFP" src="<?php  echo $_SESSION['auth']["profile_picture_path"] ?>" alt="pfp">
                     
                    <h4 id="user_name" class="name arial"><?php echo $nick ?></h4>

                    <button id="commit_change_name" onclick="toggleVisibilityChange()" type="button">✏</button>
                    <form id="name_form" class="hidden" action="../php/usr_page.php" method="post">
                        <input class="name arial" type="text" name="change_name" value="<?php echo $nick ?>"  id="change_name"/>
                        <input class="arial" id="push_profile_change" type="submit" onclick="toggleVisibilityChange(), push_cahnges()" value="Подтвердить">
                    </form>
                </div>
                
                <h3 id="my_boxes">Мои коробки </h3>
            </div>

    <?php  

    // getting boxes owned by user
        $get = [
            "lb.founder_id",
            "lb.name",
            "lb.join_hash",
            "lb.max_gift_cost",
            "lb.join_link",
            "lb.closed_or_oped",
            "lb.id"
        ];
        $tables = ["logged_box as lb"];
        $params = [
            ["lb.founder_id", "=", $usr_id, "system"]
        ];
    
        try {
            $boxes_arr = LB::query(get:$get, tables:$tables, params:$params) ;
            $box_amount = count($boxes_arr);
            setcookie('box_amount', $box_amount);
            } catch (\Throwable $th) {
                echo $th->getMessage();
                echo "<br>";
            }

// getting boxes user participates in
        $get = [
            'ualb.user_id',
            "lb.founder_id",
            "lb.max_gift_cost",
            "lb.name",
            "lb.id"
        ];
        $tables = ["logged_box as lb",
                    "users_and_logged_boxes as ualb", ];
        $params = [
            ["lb.id", "=", "ualb.box_id", "system", "AND"],
            ["ualb.user_id", "=", $usr_id, "system", "AND"],
            ["lb.founder_id", "!=", $usr_id, "system"],
        ];
    
        try {
             $boxes_arr_part = LB::query(get:$get, tables:$tables, params:$params, unique:true) ;
            $box_amount_part = count($boxes_arr_part);
            setcookie('box_amount_part', $box_amount_part);
            } catch (\Throwable $th) {
                echo $th->getMessage();
                echo "<br>";
            }
       $boxes_arr =array_merge($boxes_arr, $boxes_arr_part);
    ?>
    <div id="box_wrap" >
        <?php
        
        for ($i=0; $i < $box_amount+$box_amount_part ; $i++) { 
            if (isset($boxes_arr[$i]['join_link'])) {
                $join_link = "../joinbox_files/join_" . $boxes_arr[$i]['join_link'];
            }
            // sql updates 
            include('../php_components/box_user_info_access.php');
            include('../php_components/usr_list_upd.php');

            ?>
                <div class="box">
                    <div class="box_top"></div>
                    <div class="box_bottom">

                        <h3>
                            <span class="arial"><?php echo $boxes_arr[$i]["name"];?></span>
                            <?php 
                             if ($boxes_arr[$i]['max_gift_cost']) { ?>
                                <span class="fs12 fw100"><?php echo "Максимальная цена подарка: " . $boxes_arr[$i]['max_gift_cost'] ?></span>
                                
                             <?php }  ?>
                            
                        </h3>
                        <h3 class="usr_count fw100">
                            <?php echo "Кол.-во участников: " . $user_amount ?>
                        </h3>
                        <input type="button" onclick="toggleVisibility(<?php echo $i ?>)" class="usr_list_show" id="<?php echo "box_users_show_" . $i ?>" value="Санты" name="<?php echo "open_list" . $i ?>">
                                                                                            <!-- User list tag insertion here -->
                            <div class="usr_list" id="<?php echo("box_users_" . $i) ?>" > <?php include('../php_components/usr_list.php') ?> </div>  
                        </input>
                        <?php
            if ($_SESSION['auth']['logged_user_id'] == $boxes_arr[$i]['founder_id']) { ?> 
                 <form class="delete_form"  action="../php/usr_page.php" method="POST">
                <input for="box_bottom" class="del_button" type="submit" value="Удалить" name="<?php echo "delete_box" . $i ?>"> </input>
                <?php
            }  ?>
                    </form>
                   </div>

                </div>
                <?php 

            
                    }
                     ?>

    </div>
    
        
</main>
        <form id="exit" action="../php/usr_page.php" method="post">
                <input onclick="clearLocalStorage()" type="submit" value="Выйти" name="submit_exit" id="exit" class="btn-1 fs24"> </input>
        </form>
      
        <?php include_once('../php/footer.php') ?>
    </div>

    <script src="../js/usr_page.js"></script>
</body>
</html>