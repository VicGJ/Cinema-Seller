<?php
session_start();
global $sql;
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<link rel="stylesheet" type="text/css" href="css/mostrarCerveza.css" />
	<link rel="stylesheet" type="text/css" href="css/footer.css" />
	<script type="text/javascript" src="js/deleteComent.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
	<script src="metodos.js"></script>
	<meta charset="utf-8">
	<title>Cinema Seller</title>

	<script>
		var $_GET = <?php echo json_encode($_GET); ?>;
		CheckIfBeerExists($_GET['id']);
	</script>
</head>

<body>
	<div id="contenedor">
		<!-- Contenedor-->
		<?php require('includes/comun/header.php'); ?>

		<div class="container">
			<!--bloque del contenido central-->

			<div id="infoBeer"></div>
			<div id="buyDiv"><?php
								if (isset($_SESSION['login']) && $_SESSION['login']) {
									echo '<form  action="includes/procesarCesta.php" method="GET">';
									echo '<input type="number" id=number name="unidades" min="1" placeholder="Unidades">';
									echo '<button class="submit" type="submit" name="cerveza" value="' . $_GET['id'] . '">Añadir a la cesta</button>';
									echo '</form>';
								}
								?></div>

		</div><!-- Fin del container -->

		<div id="valoraciones">
			<?php

				$m = new MongoClient();
				echo "Connection Succesful";
				$db = $m->mydb;
				echo "base de datos seleccionada";

	
/*
			$comentarios = controllerComentarios::cargarValoraciones($cerveza->getIdCerveza());
			if ($comentarios != NULL) {
				echo "<p id='titleComment'><span id='spanTitle'>Comentarios:</span></p>";
				foreach ($comentarios as $comentario) {

					echo "<div id='showComment'>";
					echo "<p id = 'dateComent'> Fecha: " . $comentario->getFecha() . "</p>";

					echo "<p id = 'autorComent'><span id='spanId'>" . $comentario->getIdUsuario() . "
              </span></p>";
					$maxI = $comentario->getValoracion();
					for ($i = 1; $i <= $comentario->getValoracion(); $i++)
						echo "<label id=starOrange>★</label>";
					for ($l = $maxI; $l < 5; $l++)
						echo "<label id=starGrey>★</label>";
					echo "<p id = 'coment'>" . $comentario->getComentario() . "</p>";
					if (isset($_SESSION['nombreUsuario']) && $_SESSION['nombreUsuario'] == $comentario->getIdUsuario())
						echo '<input type="button" id="myBtn" onclick="deleteVal(' . $comentario->getIdComentario() . ',' . $comentario->getidCerveza() . ')" value="Eliminar valoración">';
					echo "</div>";
				}
			}
			*/
			?>
		</div>

		<div id="addComment">
			<?php
			/*
			//Formulario para aniadir comentario
			if (isset($_SESSION['login']) && $_SESSION['login']) {
				if (!controllerComentarios::existeVal($cerveza->getIdCerveza(), $_SESSION['nombreUsuario'])) {
					$opciones = array();
					$addToForm = array('idCerveza' => $cerveza->getIdCerveza());
					$opciones = array_merge($addToForm, $opciones);
					$formulario = new FormularioNuevoComentarioCerve("FormularioNuevoComentarioCerve", $opciones);
					$formulario->gestiona();
				} else
					echo "<p>Ya has valorado esta cerveza! Si quieres volver a valorarla necesitas eliminar tu valoración anterior</p>";
			}
			*/
			?>

		</div>
		<?php require('includes/comun/footer.php'); ?>

	</div> <!-- Fin del contenedor -->


</body>

</html>