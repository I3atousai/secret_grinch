<?php 
session_start();
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// // send email
// mail("gor.aslanyan.01@mail.ru","My subject",$msg);
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
    <div class="background">

        <header>
            <img id="grinch" src="img/grinch.webp" alt="grinch">
            <h2>Secret Grinch</h2>
            <nav>
                <a href="index.php">Главная Страница</a>
                <?php 
                if ($_SESSION["is_logged"] == true) {
                    ?> 
                    <a href="usr_page.php">Моя Страница</a>
                   <?php  
                }
                else {
                    ?>
                    <a href="choice.php">Вход/регистрация</a>
                    <?php
                } ?>
                
            </nav>
        </header>
        
    </div>
</body>
</html>