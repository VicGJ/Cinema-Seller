<?php
session_start(); //NECESARIO
if(isset($_SESSION['login'])){
    include 'logout.php';
}
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cinema Seller</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <input type="text" title="Nombre" name="name" placeholder="Nombre" id="name" class="text1" />
        <br>
        <input type="password" title="password" name="password" class="text1" maxlength="20" id="password" placeholder="Contraseña"/>
        <br>
        <button type="submit" class="">Login</button>
    </form>
    <form method="get" action="index.php">
        <input type="button" class="" value="Registrarse" onClick="window.location.href='registro.php'">
    </form>

        <?php if(isset($_GET['bien']))$variable = $_GET['bien'];?>
        <script>
        var $variable = <?php echo $variable ?>;
        if (variable == 0) {
            swal("Usuario y/o contraseña incorrecto", "Prueba otra vez.", "error");
        }

        </script>
    
    <!--Pie de pagina-->
    <footer>
      		<img src="imagenes/footer.jpg"  width=150px height=100px alt="Footer.">
      		<address>Autor: Victor Gomez-Jareño Guerrero <br /></address>
    </footer>



</body>

</html>
