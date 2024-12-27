<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/ideas.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Идеи для подарков</title>
    
</head>
<body>
    <div class="background">
        <?php include_once('../php_components/header.php') ?>
    <div id="box_wrap">
        <div  onmouseleave="close_box(0)" class="box">
            <div class="box_top" id="box_top_0"></div>
            <div onmouseover="open_box(0)" class="box_bottom">
                <img id="box_content_0"  src="../img/sales/gosLing.webp" alt="">
                <p class="item_name box_content_0">Футболка Гос Линг</p>
                <p class="price">837р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/KYa3jl1">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(1)" class="box">
            <div class="box_top" id="box_top_1"></div>
            <div onmouseover="open_box(1)" class="box_bottom">
                <img src="../img/sales/gosLing1.webp" alt="">
                <p class="item_name">Акриловая фигурка</p>
                <p class="price">622р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/5o1JVzn">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(2)" class="box">
            <div class="box_top" id="box_top_2"></div>
            <div onmouseover="open_box(2)" class="box_bottom">
                <img src="../img/sales/gosLing2.webp" alt="">
                <p class="item_name">Наклейка на карту</p>
                <p class="price">385р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/LzZpXA5">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(3)" class="box">
            <div class="box_top" id="box_top_3"></div>
            <div onmouseover="open_box(3)" class="box_bottom">
                <img src="../img/sales/gosLing3.webp" alt="">
                <p class="item_name">Футболка Поспать мне</p>
                <p class="price">1130р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/bZx9ZRo">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(4)" class="box">
            <div class="box_top" id="box_top_4"></div>
            <div onmouseover="open_box(4)" class="box_bottom">
                <img src="../img/sales/gosLing4.webp" alt="">
                <p class="item_name">Кружка Гослинг</p>
                <p class="price">962р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/vlvZKZ2">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(5)" class="box">
            <div class="box_top" id="box_top_5"></div>
            <div onmouseover="open_box(5)" class="box_bottom">
                <img src="../img/sales/gosLing5.webp" alt="">
                <p class="item_name">Кружка в Форме</p>
                <p class="price">744р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/OxMVz9b">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(6)" class="box">
            <div class="box_top" id="box_top_6"></div>
            <div onmouseover="open_box(6)" class="box_bottom">
                <img src="../img/sales/gosLing6.webp" alt="">
                <p class="item_name">Акриловые серьги</p>
                <p class="price">447р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/1pExwKa">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(7)" class="box">
            <div class="box_top" id="box_top_7"></div>
            <div onmouseover="open_box(7)" class="box_bottom">
                <img src="../img/sales/gosLing7.webp" alt="">
                <p class="item_name">Маска картонная</p>
                <p class="price">332р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/Wj5rgBE">Купить</a>
            </div>
        </div>
        <div  onmouseleave="close_box(8)" class="box">
            <div class="box_top" id="box_top_8"></div>
            <div onmouseover="open_box(8)" class="box_bottom">
                <img src="../img/sales/gosLing8.webp" alt="">
                <p class="item_name">Картина на стену</p>
                <p class="price">747р.</p>
                <a class="item_link" target="_blank" href="https://ozon.ru/t/ZbqyL38">Купить</a>
            </div>
        </div>
    </div>
        <?php include_once('../php_components/footer.php')?>
    </div>
    
    <script src="../js/ideas.js"></script> 
</body>
</html>