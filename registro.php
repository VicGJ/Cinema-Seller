<!DOCTYPE html>

<html lang="en">
	<head>
	   <meta charset="utf-8">
        <title>Cinema Seller</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>

    <h1>Registro</h1>
    <div class="ini">Registrarse</div>
    <div class="form">
        <form class="" method="POST" action="logicRegistro.php" id="validar">
            <input title="name" type="text" name="name" placeholder="Nombre" id="name" class="text1" value="" />
            <input title="email" type="text" name="email" placeholder="E-mail" id="email" class="text1" />
            <input title="password" type="password" name="password" placeholder="Contraseña" id="password" class="text1" />
            <br>
            <button type="submit" id="registro" name="registro" class="">Registrar</button>
        </form>
    </div>
        <?php if(isset($_GET['bien']))$variable = $_GET['bien'];?>
        <script>
        var variable = <?php echo $variable ?>;
        if (variable == 1) {
            swal("Usuario ya existente", "Pruebe otro nombre o E-mail.", "error");
        } else if (variable == 0) {
            swal("Error", "Faltan por rellenar campos o estan mal rellenos.", "error");
        }

        </script>

    <!--                Pie de pagina           -->
    <footer> <!--Pie de pagina-->
      		<img src="imagenes/footer.jpg"  width=150px height=100px alt="Vinilos.">
      		<address>Autor: Victor Gomez-Jareño Guerrero <br /></address>
    </footer>

</body>

</html>
