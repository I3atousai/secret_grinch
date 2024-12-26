<?php
session_start();
require_once "../model/Users.php";
require_once "../Service/Guard.php";
Guard::only_guest();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/reset.css">

    <title>Новый пароль</title>
</head>
<body>
<div class="background">
    <?php include_once('../php_components/header.php') ?>

  <div class="container">
           <h1 class="fs40 mb32 text_blur">Новый пароль</h1> <!-- first cut in action below -->
          <form  class="form-1" method="POST"     