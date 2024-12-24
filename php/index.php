<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Главная страница</title>
</head>
<body>
    <div class="background">
        <?php include_once('../php/header.php'); ?>
        <div id="index_grid">
            <div class="describtion_box">
                <h2 class="mb16">Как это работает</h2>
                <p>Создайте коробку, указав вид коробки, название коробки и количество участников</p>
            </div>
            <img id="first_image" src="../img/screen0.png" alt="desc_img1">
            <div>
                <img src="../img/screen1.png" alt="desc_img2">
                <img src="../img/screen2.png" alt="desc_img3">
            </div>
            <div class="describtion_box">
                <h2 class="mb16">Виды жеребьевки</h2>
                <p> &ensp; Быстрая жеребьевка - вы проводите жеребьевку из незарегистрированных пользователей,
                    результаты не сохраняются, выбирайте этот способ если не 
                    у всех участников есть доступ к сети <br>
                    &ensp; Обычная коробка - выберите количество участников, оно влияет только на то, сколько 
                   участников вам придется заполнять в следующем окне, минимальное количество-3.
                   результаты рассылаются электронными письмами всем участникам коробки после проведения 
                   жеребьевки.
                </p>
            </div>
            <div class="describtion_box">
                
                <h2 class="mb16">Подробная инструкция</h2>
                <p>С более подробной инструкцией можно ознакомится по ссылке <a id="instruction_link" href="../php/instructions.php">подробной инструкции</a> </p>
            </div>
            <div>
                <img src="../img/screen00.png" alt="desc_img00">
            </div>
        </div>
        <?php include_once('../php/footer.php')?>
    </div>
</body>
</html>