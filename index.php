<?php
session_start();

if(isset($_SESSION['user_id'])){
    //header('Localhost: /9/mostrar.php');
}
require 'conctar.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $records=$conn->prepare('SELECT id,email,contraseña FROM usuario WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $message = '';
    
    if (count($results) > 0 && password_verify($_POST['password'], $results['contraseña'])){
        $_SESSION['user_id'] = $results['id'];
        
       header('Location: mostrar.php');
    }
    else{
        $message = 'Correo electronico y contraseña no coinciden';
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
     <link rel="stylesheet" href="stilo.css">
</head>
<body>
 <div class="contenedor">
   <h1>Iniciar sesión</h1>
  
   
   <?php if(!empty($message)) : ?>
       <p><?= $message?></p>
       <?php endif; ?>
    <form action="index.php" method="post">
    <input type="text" name="email" placeholder="Ingrese su email" required='required'>
    <input type="password" name="password" placeholder="Ingrese su contraseña" required='required'>
    

    <span> ¿No tienes una cuenta?<a href="registrarse.php">!Regístrate</a></span><br><br>

    <input type="submit" value="eniciar">
    </form>
    </div>
</body>
</html>