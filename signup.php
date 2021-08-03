<?php 
    
    require 'database.php';

    $message = null;
    
    if (!empty($_POST['email']) && !empty(['password'])) {
        $sql = 'INSERT INTO user(email,password) values(:email,:password);';
        $statment = $conn->prepare($sql);
        $statment->bindParam(':email',$_POST['email']);
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $statment->bindParam(':password',$password);
        
        if ($statment->execute()) {
            $message = 'Usuario creado con exito';
        }
        else {
            $message = 'Lo sentimo, ocurrio un error al guardar los datos';
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
    <?php if(!empty($message)):?>
        <p><?= $message ?></p>
    <?php endif;?>

    <h1>Registro</h1>
    <a href="login.php">Login</a>
    <form action="signup.php" method="post">
        <input type="text" name="email" id="email" placeholder="Ingrese su email">
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
        <input type="password" name="password2" id="password2" placeholder="Confirme su contrseña">
        <input type="submit" value="Registrar">
    </form>
</body>
</html>