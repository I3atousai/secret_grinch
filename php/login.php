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

    <title>Вход</title>
</head>
<body>
<div class="background">
    <?php include_once('../php_components/header.php') ?>

  <div class="container">
          <h1 class="fs40 mb32 text_blur">Вход</h1>
          <form  class="form-1" method="POST" action="../php/login.php">
            <input required class="mb8" type="text" name="nick" placeholder="Введите Псевдоним" />
            <input required
              class="mb8"
              type="password"
              name="password"
              placeholder="*******"
            />
            <button class="btn-1 fs24" name="submit">Подтвердить</button>
           
          </form>
          <p id="initiate_password_recovery">
            <a class="arial" href="../password_recovery/initiate_recovery.php">Забыли пароль?</a>
          </p>
  <?php
  if (isset($_POST["submit"])) {
    
    try {
      $nickname = $_POST['nick'];
      
      $password = $_POST['password'];
      
      $usr_inp = ["name"=> $nickname,
                  "password"=> $password];
  
    
      $usr_data = Users::get_by_name($nickname);
    
    
      if (password_verify($password, $usr_data["password"])) {
        $_SESSION['auth'] = [
              'logged_user_id' =>$usr_data['id'],
              'password' => $_POST['password'],
              'nick' => $_POST['nick'],
              'profile_picture_path' => $usr_data["profile_pic_path"]
            ];

          header( 'Location:../php/usr_page.php');
      }
      else {
        ?>
        <p id="failed_login_message"><?php  echo "Неправильный логин/пароль"; ?> </p>
       <?php
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


