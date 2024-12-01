<?php
session_start();
require_once "Users.php";
require_once "Logged_Box.php";
require_once "UALB.php";

$nickname = $_SESSION["nick"];
$usr_data = Users::get_by_name($nickname);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inner Box</title>
</head>
<body>
    <h1>Коробка </h1><?php echo $_SESSION["box_name"] ?>
    <form id="main_form"  class="form-1 mb60" method="POST" action="inner_box_logged.php">
<?php  
$added_user_name = "user_name1";
$index = 0;
    
    for ($i=0; $i < $_SESSION["user_amount"]; $i++) { 
        $added_user_name = substr($added_user_name, 0, -1);
        $index++;
        $added_user_name .= $index;
        ?>
        <input required id="<?php $added_user_name ?>" required class="mb8" type="text" name="<?php $added_user_name ?>" placeholder="Введите Имя <?php $index ?> Участника"/>
        <label for="<?php $added_user_name ?>"><?php echo "Cанта № " . $index  ?></label>
        <br>
        <?php 
        } ?>
        <input type="submit" value="Подтвердить" name="submit" class="btn-1 fs24"> </input>
         
    </form>

    <?php   
            if (isset($_POST["submit"])) {
                for ($i=0; $i < $_SESSION["user_amount"]; $i++) { 
                    // create data base insertions of logged box and logged_box x user relationships here
                }
                

                // header("Location:index.php");
            }
        ?>
</body>
</html>


