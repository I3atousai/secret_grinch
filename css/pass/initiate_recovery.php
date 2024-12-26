<?php
session_start();
require_once "../model/Users.php";
require_once "../Service/Guard.php";
Guard::only_guest();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/reset.css">

    <title>Восстанволение пароля</title>
</head>
<body>
<div class="background">
    <?php include_once('../php_components/header.php') ?>

  <div class="container">
          <h1 class="fs40 mb32 text_blur">Восстанволение Пароля</h1>
          <form  class="form-1" method="POST" action="../password_recovery/initiate_recovery.php">
            <input class="arial mb8" required class="mb8" type="email" name="email" placeholder="Введите свою почту" />
            <button class="btn-1 fs24" name="submit">Подтвердить</button>
          </form>
  <?php
  if (isset($_POST["submit"])) {
      try {
          
        $get = [
            "u.id",
            "u.name"
        ];
        $tables = ["users as u"];
        $params = [
            ["u.email", "=", $_POST['email'], "value"]
        ];
        $user = Users::query(get:$get, tables:$tables, params:$params, fetch_mode:'one') ;

        echo $user['name'];

        if (!isset($user['name'])) {
            ?>
            <p id="failed_login_message"><?php echo "Пользователя с такой почтой не сущестувет"; ?> </p>
          <?php
        }else {
            $hash_to_add = password_hash($_POST["email"], PASSWORD_DEFAULT);
            $hash_to_add = str_replace( array( '\'', '"',',' , ';', '<', '>','$', '.', '/', '\\', '|' ), '', $hash_to_add);

            date_default_timezone_set('Russia/Moscow');
            $date_now = date('Y-m-d h:i:s ', time());

            Users::update(
                ['pass_reset_time' => $date_now,
                        'pass_reset_hash' => $hash_to_add],
                [
                    ['id', '=', $user['id'], 'value']
                ]
            );
                $santa_email = $_POST['email'];
                $santa_name = $user['name'];


                //make a reset file here
                $message = file_get_contents('../password_recovery/php_templates/template_first_half.php',TRUE);
                $message .= "action=\"" . '..' . "/password_recovery/" . $user['name']. $user['id'] . ".php\">";
                $message .= file_get_contents('../password_recovery/php_templates/template_second_half.php',TRUE);
                $message .=  "\$" . 'password_reset_hash ="' . $hash_to_add . "\";\n";
                $message .=  "\$" . 'user_id ="' . $user['id'] . "\";\n";
                $message .= file_get_contents('../password_recovery/php_templates/template_third_half.php',TRUE);
                
                $myfile = fopen($user['name']. $user['id'] . ".php"  , "w") or die("Unable to open file!");
                fwrite($myfile, $message);
                fclose($myfile);
                
                
                $subject = "Восстановление пароля ";
                
                $message = file_get_contents('../password_recovery/mail/mail_to_santa_first.html',TRUE);
                $message .= $user['name'];
                $message .= file_get_contents('../password_recovery/mail/mail_to_santa_second.html',TRUE);
                $message .= file_get_contents('../password_recovery/mail/mail_to_santa_third.html',TRUE);
                $message .= file_get_contents('../password_recovery/mail/mail_to_santa_fourth.html',TRUE);
                $message .= $user['name']. $user['id'] . ".php?password_recovery_hash=" . $hash_to_add ;
                $message .= file_get_contents('../password_recovery/mail/mail_to_santa_fifth.html',TRUE);
                ?>
                <p id="failed_login_message"><?php echo "Письмо было отправлено на вашу почту"; ?> </p>
              <?php
                include("../Service/send_mail.php");
        }
    } catch (\Throwable $th) {
    echo $th->getMessage();
  }
  }
  ?>
        </div>

    <?php include_once('../php_components/footer.php') ?>
  </div>
</body>
</html>



</html>