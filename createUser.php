<?php
$mail = $_POST['nombre'];
$contrasenia = $_POST['contrasenia'];

$conexion = mysqli_connect("sql107.260mb.net","n260m_28355016","Pacha1234","n260m_28355016_User_proyectoIngenieria") or die("error en la coneccion");

$consulta = "SELECT * FROM Usuarios WHERE Nombre = '$mail' AND Pass = '$contrasenia'";
$resultado = $conexion->query($consulta);

$filas = mysqli_num_rows($resultado);

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

if($filas == FALSE){
   
    $query = "INSERT INTO Usuarios(Nombre,Pass) VALUES ('$mail','$contrasenia')";
    $do = $conexion->query($query);
    ?>
    <?php
    include("index.html");
    ?>
     <h2>Felcidades, ahora ya puedes iniciar sesión!</h2>
    <?php
}else{
    
    ?>
    <?php
    include("index.html");
    ?>
    <h2>Usuario ya registrado</h2>;
    <?php
}
mysqli_free_result($resultado);
mysqli_free_result($do);
mysqli_close($conexion);