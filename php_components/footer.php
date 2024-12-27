

<footer>
    <h2>Secret Grinch</h2>
    <nav>
        <?php if (isset($_SESSION['auth'])) { ?>
            <a href="../joinbox_files/box.php">Создать коробку</a>
       <?php } ?>
        <a href="../php/ideas.php">Идеи подарков</a>
        <a href="../php/instructions.php">Инструкция</a>
    </nav>
    <div class="icons">
        <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>

    </div>
    <p class="arial">© 2024-2024 Secret Grinch</p>
</footer>