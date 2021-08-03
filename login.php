<?php
    require 'database.php';
    session_start();

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = 'SELECT id,email,password FROM user WHERE email=:email;';
        $records = $conn->prepare($sql);
        $records->bindParam(':email',$_POST['email']);
        $records->execute();
        
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
            
        if (count($results) > 0 && password_verify($_POST['password'],$results['password'])) {
            $_SESSION['user'] = $results['email'];
            
            header("location: /php-login");
        }else {
            $message = 'Credenciales incorrectas';
        }

    }
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <?php require 'partials/header.php';?>

    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <form action="login.php" method="post">
    <input type="text" name="email" id="email" placeholder="Ingrese su email">
    <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
    <br>
    <input type="submit" value="Ingresar">
    </form>
</body>
</html>