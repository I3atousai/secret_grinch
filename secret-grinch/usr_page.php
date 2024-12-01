<?php
    session_start();
    $nick = $_SESSION["nick"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
</head>
<body>
    <h1>You are in!!! </h1>
    <h4 class="name"> <?php echo $nick ?> </h4>
    <h4 class="name"> <?php echo $_SESSION["logged_user_id"] ?> </h4>
    <form action="usr_page.php" method="POST">
        <input type="submit" value="Выйти" name="submit" class="btn-1 fs24"> </input>
    </form>
        <?php
    if (isset($_POST["submit"])) {
        session_destroy();
        header("login.php");
            } ?>
   
</body>
</html>