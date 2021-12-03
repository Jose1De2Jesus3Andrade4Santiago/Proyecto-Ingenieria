<?php
$mail = $_POST['mail'];
$contrasenia = $_POST['contraseña'];

$conexion = mysqli_connect("usuariosproying.cpi2tw3idinn.us-east-1.rds.amazonaws.com","admin","chuchisA25**","usuariosproying") or die("error en la conexion");

$consulta = "SELECT * FROM Usuarios WHERE Nombre = '$mail' AND Pass = '$contrasenia'";
$resultado = $conexion->query($consulta);

$filas = mysqli_num_rows($resultado);

if($filas == TRUE){
    header("location:userDash.html");
}else{
    ?>
    <?php 
    include("error.html");
    ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);