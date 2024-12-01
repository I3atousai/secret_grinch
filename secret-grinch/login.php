<?php
session_start();
require_once "Users.php";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/reset.css">

    <title>Login Page</title>
</head>
<body>
<div class="background">

  <div class="container">
          <h1 class="fs40 mb32 text_blur">Вход</h1>
          <form  class="form-1 mb60" method="POST" action="login.php">
            <input required class="mb8" type="text" name="nick" placeholder="Введите Псевдоним" />
            <input required
              class="mb8"
              type="password"
              name="password"
              placeholder="*******"
            />
            <button class="btn-1 fs24">Подтвердить</button>
           
          </form>
  <?php
  try {
    $nickname = $_POST['nick'];
    
    $password = $_POST['password'];
    
    $usr_inp = ["name"=> $nickname,
                "password"=> $password];
  
    $usr_data = Users::get_by_name($nickname);
  
  
    if (password_verify($password, $usr_data["password"])) {
      $_SESSION["logged_user_id"] = $usr_data["id"];
      $_SESSION["password"] = $_POST['password'];
      $_SESSION["nick"] = $_POST['nick'];
      $_SESSION["is_logged"] = true;
      try {
        header( 'login.php');
      } catch (\Throwable $th) {
        echo $th->getMessage();
      }
      
    }
    else {
      ?>
      <p id="failed_login_message"><?php  echo "Неправильный логин/пароль"; ?> </p>
     <?php
    }
  
  } catch (\Throwable $th) {
    echo $th->getMessage();
  }
  ?>
        </div>
  </div>
</body>
</html>


