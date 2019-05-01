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
    </head>
    <body>
        <?php
            include "navbar.php";
        ?>
        <div id="contenido">

            <h1>Lista de Peliculas</h1>
            <div id="listado">
            	
			<?php
			include 'basededatos/pelicula.php';

			$peliculas = new SimpleXMLElement($xmlstr);
            echo "<div>";
            
            if(isset($_POST['botondeanadir']))
            {
                $aux = $_POST['botondeanadir'];
                $db = conectar();
                $query = "INSERT INTO carro(user, pelicula) VALUES('".$_SESSION['usuario']."', '".$aux."')";
                $resultado=mysqli_query($db,$query);
                desconectar($db);
            }

			foreach ($peliculas->xpath('//pelicula') as $titulo) {
            echo "<p>";
    		echo "<b>".$titulo->nombre."</b>";
            $peli = $titulo->nombre;
    		echo '<img src="'.$titulo->image_path.'" height="100"; "width="100" ;>' . "\n";
            echo '<form action = "listaComprar.php" method = "post">';
            if(!añadida($peli)){
            echo'<p><button type="submit" name="botondeanadir" value="'.$peli.'">Añadir carrito</button></p>';
            }
            echo '</form>';
           
            echo "</p>";
            
    		}
            echo "</div>";
			?>
            <?php
                function añadida($peli)
                {
                    $db = conectar();
                    $query = "SELECT * FROM carro WHERE pelicula = '".$peli."' AND user = '".$_SESSION['usuario']."'";
                    $results = mysqli_query($db, $query);
            
                    if (mysqli_num_rows($results) == 1) { 
                        return true;
                    }
                    else return false;
                }
             ?>
					
            </div>


       </div> 
        
    </body>
</html>