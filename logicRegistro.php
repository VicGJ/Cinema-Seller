<?php
session_start();

include 'conexion.php';
    
$name = $_POST['name'];
$email = $_POST['email'];
$contrasenia= $_POST['password'];
$contraseniaCifrada = sha1(md5($contrasenia));
$db = conectar();
$query="SELECT * FROM users WHERE email='$email' || name='$name'";

$resultado=mysqli_query($db,$query);
if($name == ''|| $email == ''||$contrasenia ==''){
    desconectar($db);
    header ('Location: registro.php?bien=0');
}else if (mysqli_num_rows($resultado)){
    desconectar($db);
    header ('Location: registro.php?bien=1');
} else {
    $aux = 0;
	$consulta = "INSERT INTO users (name, email, password, admin) VALUES ('$name', '$email', '$contraseniaCifrada', '$aux')";
    
    $resul = mysqli_query($db, $consulta);

    $_SESSION["usuario"]= $name;
    $_SESSION["admin"]= false;
    $_SESSION["login"]= true;
    desconectar($db);
    header('Location: index.php');

}
		
?>
