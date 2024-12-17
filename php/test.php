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
    <title>Main page</title>
</head>
<body>
    <div class="background">
        <?php include_once('../php/header.php') ?>
        <?php 
        $message = "ddddd";
        $myfile = fopen("join_.php" , "w") or die("Unable to open file!");
               
        // touch('/home/gor/test.txt') or die("Unable to open file!");
        fwrite($myfile, $message);
                fclose($myfile); 
                ?>
        <?php include_once('../php/footer.php')?>
    </div>
</body>
</html>