<?php 
session_start();
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

            <h1>Lista de Actores</h1>
            <div id="listado">
            	
			<?php
			include 'basededatos/actores_actrices.php';

			$actores = new SimpleXMLElement($xmlstr);

			foreach ($actores->xpath('//actores') as $actor) {
    		echo '<a href="'.$actor->URL.'"target="_blank">'.$actor->nombre.'</a>' . $actor->edad . "\n";
    		}
    		
			?>

					
            </div>


       </div> 
        
    </body>
</html>