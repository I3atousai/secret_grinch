
<!-- require_once "./model/Model.php"; -->

<header>
    <img id="grinch" src="../img/grinch.webp"; alt="grinch">
    <h2>Secret Grinch</h2>
    <nav>
            <a class="arial" href="../php/index.php">Главная Страница</a>
            <?php 
            if (isset($_SESSION['auth'])) {
                ?> 
                <a class="arial" href="../php/usr_page.php">Моя Страница</a>
               <?php  
               ?> 
               <a class="arial" href="../joinbox_files/box.php">Создать Коробку</a>
              <?php  
            }
            else {
                ?>
                <a class="arial" href="../php/choice.php">Вход/регистрация</a>
                <?php
                
            } ?>
            
        </nav>
    </header>