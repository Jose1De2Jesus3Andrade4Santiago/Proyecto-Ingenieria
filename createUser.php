<?php
$mail = $_POST['nombre'];
$contrasenia = $_POST['contrasenia'];

$conexion = mysqli_connect("usuariosproying.cpi2tw3idinn.us-east-1.rds.amazonaws.com","admin","chuchisA25**","usuariosproying","3306") or die("error en la conexion");

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
