<?php 
session_start();

require_once "../model/UALB.php";   
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
        <?php include_once('../php/header.php') ;
       echo $_GET['hell_of_a_ride'];
       echo $_GET['link'];

        $message = file_get_contents('../mail/template.php',TRUE);
        $headers  = "From: " . "grinchsecret@gmail.com" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        ?>


        <?php 
       
                ?>
                    <!-- this worked -->
                <!-- <a href="../php/index.php?fugu=stream">index</a> -->
        <?php include_once('../php/footer.php')?>
    </div>
    
      
</body>
</html>