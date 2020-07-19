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