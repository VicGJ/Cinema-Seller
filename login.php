<?php
    session_start();
    include 'conexion.php';

    $name = $_POST['name'];
    $contrasenia = $_POST['password'];
    $contrasenia=sha1(md5($contrasenia));
    $db = conectar();
    $query = "SELECT * FROM users WHERE name='$name' && password='$contrasenia'";

    $resultado=mysqli_query($db,$query);

    if(mysqli_num_rows($resultado)){
        $fila=mysqli_fetch_assoc($resultado);
        $nombre= utf8_encode ( $fila['name'] );
        array_push($lista, "$nombre");
        //valores en la sesion.
        $_SESSION["usuario"]= $nombre;
        $_SESSION["login"]= true;
        if($fila['admin'] == 1){
            $_SESSION["admin"]= true;
        }
        else{
            $_SESSION["admin"]= false;
        }
        desconectar($db);
        $aux =  $_SESSION["usuario"];
        header('Location: listaComprar.php');

    } else {
        desconectar($db);
        header('Location: index.php?bien=0');

    }
 
?>
