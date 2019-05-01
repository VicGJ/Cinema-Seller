<?php 
	session_start(); //NECESARIO
	//Eliminar carrito
	include 'conexion.php';
	$db = conectar();
    $consul = "TRUNCATE TABLE carro";
    $query = mysqli_query($db, $consul);
    
	session_destroy();			// se destruye la sesion
	$_SESSION['login'] = false;
	unset($_SESSION);
	header('location: index.php');

?>