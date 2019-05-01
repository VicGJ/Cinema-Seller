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
        <link href="css/navbar.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/metodos.js"></script>
        
	</head>
	<body>
        
        <?php
            include "navbar.php";
        ?>
        <div id="contenido">
            <div class="listado">
            <h1>Resultados busqueda</h1>
            <div id="demo"></div>
            <script>
                var $_POST = <?php echo json_encode($_POST); ?>;
                searchFilm($_POST['aBuscar']);
            </script>
             </div>
        </div>
	</body>
</html>