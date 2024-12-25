<?php 
session_start();
require_once "../model/Logged_Box.php";
require_once "../model/UALB.php";
require_once "../model/Users.php";
require_once "../Service/Guard.php";
Guard::only_user();

if(isset($_POST['send_results'])) {
    header("Location:../php/usr_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/quick_results.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Жеребьевка</title>
</head>
<body>
    <div class="background">
        <?php include_once('../php_components/header.php') ?>
        
        <?php if (isset($_POST['shuffle_box'])) {
            $get = [
                'u.name',
                "u.email",
                 "lb.name as box_name"
            ];
            $tables = ["logged_box as lb",
                        "users as u",
                        "users_and_logged_boxes as ualb", ];
            $params = [
                ["u.id", "=", "ualb.user_id", "system", "AND"],
                ["lb.id", "=", $_POST['shuffle_box'], "value", "AND"],
                ["ualb.box_id", "=", $_POST['shuffle_box'], "value"],
            ];
        
            try {
                $users_arr = Users::query(get:$get, tables:$tables, params:$params, unique:true) ;
              
                } catch (\Throwable $th) {
                    echo $th->getMessage();
                    echo "<br>";
                }
                shuffle($users_arr);
                $santas = $users_arr;
                $var = $users_arr[0];
                $users_arr[count($users_arr)] = $var;
                array_shift($users_arr);

            $_SESSION["shuffle"] = [
                'santas' => $santas,
                'participants' => $users_arr
            ];
        }?>
        
            <div id="quick_grid" class="mb60">
                <section class="participants">
                    <h2 class="mb32">Санта</h2>
                    <?php 
                        for ($i=0; $i < count($_SESSION["shuffle"]['santas']); $i++) { 
                            ?>
                                <p class="mb16 participant_name"><?php echo 
                                $_POST['shuffle_box']? $_SESSION["shuffle"]['santas'][$i]['name']: $_SESSION["shuffle"]['santas'][$i] ?></p>
                            <?php
                        }
                    ?>
                </section>
                <section class="participants">
                    <div id="participant" class="blured">
                        <h2  class="mb32">Подопечный</h2>

                        <?php 
                            for ($i=0; $i < count($_SESSION["shuffle"]['participants']); $i++) { 
                                ?>
                                    <p class="mb16 participant_name"><?php echo 
                                    $_POST['shuffle_box']? $_SESSION["shuffle"]['participants'][$i]['name']: $_SESSION["shuffle"]['participants'][$i] ?></p>
                                <?php
                            }
                        ?>
                    
                    </div>
                </section>
                <form  action="../php/results.php" method="post">
                        <input class="result_button" name="send_results" type="submit" value="Отправить письма Сантам"></input>
                </form>
                
                <input class="result_button" name="send_results" type="button" onclick="reveal()" value="Показать Подопечных"></input>

                <?php  
               $box_name = ($_SESSION["shuffle"]['santas'][0]['box_name']) ;
               $subject = "Результаты жеребьевки коробки " . $box_name;
                    if(isset($_POST['send_results'])) {
                        for ($i=0; $i < count($_SESSION["shuffle"]['santas']); $i++) { 
                             $santa_email = $_SESSION["shuffle"]['santas'][$i]['email'];
                             $santa_name = $_SESSION["shuffle"]['santas'][$i]['name'];

                            $message = file_get_contents('../mail/mail_to_santa_first.html',TRUE);
                            $message .= $_SESSION["shuffle"]['santas'][$i]['name'];
                            $message .= file_get_contents('../mail/mail_to_santa_second.html',TRUE);
                            $message .=  $_SESSION["shuffle"]['participants'][$i]['name'] ;
                            $message .= file_get_contents('../mail/mail_to_santa_third.html',TRUE);
                            $message .=  $box_name ;
                            $message .= file_get_contents('../mail/mail_to_santa_fourth.html',TRUE);
                            // echo $message;
                            // echo "<br>";
                           include("../Service/send_mail.php");
                        }  
                        unset($_SESSION['shuffle']);
                    }
                ?>
            </div>
        <?php include_once('../php_components/footer.php') ;
        ?>
    </div>
    <script src="../js/results.js"></script>
</body>
</html>