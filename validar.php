<?php
$mail = $_POST['mail'];
$contrasenia = $_POST['contraseña'];

$conexion = mysqli_connect("sql107.260mb.net","n260m_28355016","Pacha1234","n260m_28355016_User_proyectoIngenieria") or die("error en la coneccion");

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