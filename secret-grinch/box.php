<?php  
session_start();
// require_once "Users.php";

// require_once "UALB.php";
// $nickname = $_SESSION["nick"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box</title>
</head>
<body>

<form id="main_form"  class="form-1 mb60" method="POST" action="box.php">
          <input id="box_name" required class="mb8" type="text" name="box_name" placeholder="Введите Имя Коробки"/>
          <label for="box_name"></label>
          <br>
          <!-- <input id="user_name1" required class="mb8" type="text" name="user_name1" placeholder="Введите Имя Участника"/>
          <label for="user_name1"></label> -->
          
            <input required class="mb8" type="number" name="user_amount" placeholder="Введите Количество Сант" />
            
          <br>
          <input type="submit" value="Подтвердить" name="submit" class="btn-1 fs24"> </input>
         
        </form>
        <?php   
            if (isset($_POST["submit"])) {
                require_once "Logged_Box.php";
                $_SESSION["box_name"] = $_POST["box_name"];            
                $_SESSION["user_amount"] = $_POST["user_amount"];
                $data = [
                  "name" => $_SESSION["box_name"],
                  "founder_id" => $_SESSION["logged_user_id"]
              ];
                LB::add($data);
                // 
                header("Location:inner_box_logged.php");
            }
        ?>
</body>
</html>