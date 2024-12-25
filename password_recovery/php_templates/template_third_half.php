
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
    //  } else {
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
