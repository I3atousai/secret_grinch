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

    <title>Новый пароль</title>
</head>
<body>
<div class="background">
    <?php include_once('../php_components/header.php') ?>

  <div class="container">
           <h1 class="fs40 mb32 text_blur">Новый пароль</h1> <!-- first cut in action below -->
          <form  class="form-1" method="POST"     action="../password_recovery/gundam17.php">
          <input required
                class="mb8"
                pattern="[a-z0-9]{8,}"
                type="password"
                name="password"
                placeholder="Пароль более 8 символов"
              />
            <button class="btn-1 fs24" name="submit">Подтвердить</button>
          </form>
  <?php
  if (isset($_GET['password_recovery_hash'])) {
    # code...
    $_SESSION['password_recovery_hash'] = $_GET['password_recovery_hash'];
  }
  if (isset($_POST["submit"])) {
$password_reset_hash ="2y10Qvib6NzdLvUV23qYjUxuv3chkiEPjWoaRMs1XQg0aEtmU17bJa";
$user_id ="17";

date_default_timezone_set('Russia/Moscow');
            $date_now = date('Y-m-d h:i:s ', time());

      $get = [
    //    "DATEDIFF(users.pass_reset_time, " . $date_now . ') as diff',
        "users.pass_reset_hash"
    ];
    $tables = ["users"];
    $params = [
        ["users.id", "=", $user_id, "value"]
    ];
    $reset_time = Users::query(get:$get, tables:$tables, params:$params, fetch_mode:'one') ;
     // if ($reset_time['diff'] < -1) {
        ?>
            <p id="failed_login_message"><?php echo "Прошло слишком много времени, ссылка недействительна"; ?> </p>
          <?php
     // } else {
        if ($_SESSION['password_recovery_hash'] != $reset_time['pass_reset_hash']) {
          ?>
            <p id="failed_login_message"><?php echo "Ссылка повреждена"; ?> </p>
          <?php
        } else {
          
          $password_new = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
          Users::update(
            ['password' => $password_new,
            'pass_reset_hash' => "NULL"
          ],
            [
                ['id', '=', $user_id, 'value']
            ]
        );
        ?>
              <p id="failed_login_message"><?php echo "Восстановление пароля прошло успешно"; ?> </p>
            <?php
        sleep(4);
              header( 'Location:../php/login.php');
        }
//     }
    }
  ?>
        </div>

    <?php include_once('../php_components/footer.php') ?>
  </div>
</body>
</html>
