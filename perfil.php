<?php 
session_start();
include 'conexion.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modificar perfil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/navbar.css" rel="stylesheet">
</head>
<body>
	<?php
        include "navbar.php";
    ?>
	<h1>Modificar perfil</h1>
	<?php
		echo '<form action="perfil.php" method="post">';
		echo '<p>Email: <input type="text" name="email" /></p>';
		echo '<p><input type="submit" value="enviar" name="modif" /></p>';
		echo '</form>';
	?>

	<?php
	if(isset($_POST['modif']))
    {   
		$email = $_POST['email'];
		$db = conectar();
		$query = "UPDATE users SET email = '".$email."' WHERE name = '".$_SESSION['usuario']."'";
	    $resultado=mysqli_query($db,$query);
	}
	?>		
<!--Pie de pagina-->
    <footer>
      	<img src="imagenes/footer.jpg"  width=150px height=100px alt="Footer.">
      	<address>Autor: Victor Gomez-Jareño Guerrero <br /></address>
    </footer>
</body>
</html>