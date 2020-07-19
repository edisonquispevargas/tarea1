
<?php
require 'conctar.php';


$messaje= '';

if(!empty($_POST['email'])&&
      !empty($_POST['password'] ) ){
    $sql = "INSERT INTO usuario(email, contraseña) VALUES(:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$_POST['email']);
    $contraseña = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$contraseña);
    
    if($stmt->execute()){
        $messaje = 'Su correo y contraseña fue registrado exitosamente';
        
    }else{
        $messaje = 'error';
    }
        
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <link rel="stylesheet" href="stilo.css">
</head>
<body>
<div class="contenedor">
       
       <?php if(!empty($messaje)): ?>
       <p><?= $messaje?></p>
       <?php endif; ?>
       
       <h1>Registrarse</h1>
      
     height="100"><br>
       <span>Si ya tiene una cuenta puede <a href="index.php">Ingresar</a></span>
       
       <form action="registrarse.php" method="post">
    <input type="text" name="email" placeholder="Ingrese su email" autocomplete="off" required='required'>
    <input type="password" name="password" placeholder="Ingrese su contraseña" required='required'>
    
    <input type="submit" value="guardar">
    </form>
       </div>
</body>
</html>