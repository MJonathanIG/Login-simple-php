<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php require 'partials/header.php'; ?>

    <h1>Bienvenido :)</h1> 
    <?php if(!empty($_SESSION['user'])): ?>
    <span> <?= $_SESSION['user'] ?></span>
    <a href="logout.php">Salir</a> 
    <?php else : ?>
    <a href="login.php">Logeate</a> 
    <span> o </span>
    <a href="signup.php">Registrate</a>
    <?php endif; ?> 

    
</body>
</html>