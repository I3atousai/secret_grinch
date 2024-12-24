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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Инструкции</title>
    
</head>
<body>
    <div class="background">
        <?php include_once('../php/header.php') ?>
       
        <div id="index_grid">
            <div class="describtion_box">
                <h2 class="mb16">Коробки</h2>
                <p>При нажатии на кнопку "Санты" появляется список 
                    участников, в нем можно загадать желание для своего подарка, 
                если вы являетесь создателем коробки, вам доступны пополнительные функции</p>
            </div>
            <div>
                <img src="../img/instruct1.png" alt="desc_img1">
            </div>

            <div>

                <img src="../img/instruct0.png" alt="desc_img1">
            </div>
            <div class="describtion_box">
                <h2 class="mb16">Управление коробкой</h2>
                <p> &ensp; Иконка списка является ссылкой для присоединения к коробке,
                    (войти в коробку могут только зарегистрированные пользователи) <br>
                    &ensp; Иконка игральной кости перенаправляет вас на страницу жеребьевки <br>
                    &ensp; Иконка в виде галочки или крестика обозначает закрытое или открытое состояние коробки,
                    к закрытой коробке нельзя присоедениться <br>
                    &ensp; Нажав на крестик рядом с именем пользователя можно удалить его из коробки <br>
                </p>
            </div>


            <div class="describtion_box">
                
                <h2 class="mb16">Жеребьевка</h2>
                <p>Во время жеребьевки создатель коробки имеет опцию разослать письма сантам, не зная имена их 
                    подопечных. <br>
                    При проведении повторных жеребьевок рекомендуется ориентировалься 
                    по последнему письму, присланному санте.
                </p>
            </div>
            <img id="first_image" src="../img/instruct2.png" alt="desc_img1">
        </div>

        
        <?php include_once('../php/footer.php')?>
    </div>
    
      
</body>
</html>