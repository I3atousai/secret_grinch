<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Main page</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Главная Страница</a>
            <?php 
            if ($_SESSION["is_logged"] == true) {
                ?> 
                <a href="usr_page.php">Моя Страница</a>
               <?php  
               ?> 
               <a href="box.php">Создать Коробку</a>
              <?php  
            }
            else {
                ?>
                <a href="choice.php">Вход/регистрация</a>
                <?php
                session_destroy();
                
            } ?>
            
        </nav>
    </header>

</body>
</html>