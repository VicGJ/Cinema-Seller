<?php 
session_start();
include 'conexionMongo.php';
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

            <h1>Comentarios</h1>
            <?php
            $db = conectar();
            ?>

            <?php
            echo '<form action="" method="post">';
            echo'Pelicula:<br><textarea name="pelicula"></textarea> <br>';
            echo'Comentario:<br><textarea name="txtcomentario"></textarea> <br>';
            echo'<p><button type="submit" name="btncomentario" value="">Comentar</button></p>';

            if(isset($_POST['btncomentario']))
            {
                $col = $db->comentarios->comentarios;
                $document = array(
                "pelicula" => $_POST["pelicula"],
                "texto" => $_POST["txtcomentario"],
                "usuario" => $_SESSION["usuario"]
                ) ;
                $col->insertOne($document);
            }
            echo'</form>';
            ?>
            <div id="listado">
            	
			<?php
        		$colecion = $db->comentarios->comentarios;
                $cursor = $colecion->find();

                echo "<div>";
                foreach($cursor as $document){
                    echo "<p>Usuario: ". $document ["usuario"]. " ";
                    echo "Pelicula: ".$document ["pelicula"]. " ";
                    echo "Comentario: ".$document ["texto"]. "</p>";
                    $mongoId = $document ["_id"];
                    if($document ["usuario"] == $_SESSION["usuario"])
                    {
                        echo '<form action = "" method = "post">';
                        echo'<p><button type="submit" name="borrar" value="'.$mongoId.'">Borrar comentario</button></p>';
                        //echo '</form>';

                        //echo '<form action="" method="post">';
                        echo'Editar Comentario:<br><textarea name="txtcomentario"></textarea> <br>';
                        echo'<p><button  type="submit" name="btnedit" value="'.$mongoId.'">Comentar</button></p>';
                        //echo '</form>';
                    }
                }
                echo "</div>";
                if(isset($_POST['borrar']))
                    {
                            $aux = $_POST['borrar'];
                            $col = $db->comentarios->comentarios;
                            $col->deleteOne(["_id" => new MongoDB\BSON\ObjectId("$aux")]);
                    }

                if(isset($_POST['btnedit']))
                {
                    $aux = $_POST['btnedit'];
                    $text = $_POST["txtcomentario"];
                    $col = $db->comentarios->comentarios;
                    $col->updateOne(["_id" => new MongoDB\BSON\ObjectId("$aux")],['$set'=> [ "texto" => "$text"]]);
                }   
                
			?>

					
            </div>


       </div> 
        
    </body>
</html>