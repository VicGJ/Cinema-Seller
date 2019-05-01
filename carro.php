<?php 
    session_start(); 
    include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	   <meta charset="utf-8">
        <title>Cinema Seller</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/navbar.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	</head>
	<body>
        <?php
            include "navbar.php";
        ?>
        <div id="contenido">
            <h1>Carro de la compra</h1>
            <?php
            $db = conectar();
            

            $usu = $_SESSION['usuario'];
            $consul = "SELECT * FROM carro WHERE user = '".$usu."'";

            $query = mysqli_query($db, $consul);
            
            $lista = array();
            while($row = mysqli_fetch_array($query)) {
            // Append to the array
                $lista[] = $row['pelicula'];   
            }

            

            foreach($lista as $name)
            {
                echo $name;
                echo '<br>';
                echo '<form action = "carro.php" method = "post">';
                echo'<p><button type="submit" name="borrar" value="'.$name.'">Quitar del carrito</button></p>';
                echo '</form>';

            }

            if(isset($_POST['borrar']))
            {
                $aux = $_POST['borrar'];
                $db = conectar();
                $query = "DELETE FROM carro WHERE pelicula = '".$aux."'";
                $resultado=mysqli_query($db,$query);
                desconectar($db);
            }

            ?>
        </div>
	</body>
</html>