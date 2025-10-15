<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo1</title>
</head>
<body>
    <h1>
        <?php 
            echo "Hola Mundo He modificado el archivo<br/>";
            //Comentario de una línea
            #Comentario de una línea
            /*
            Comentario
            de varias líneas */

            $miVariable = 5;

            echo $miVariable;
            echo '<br/>Mi variable vale ', $miVariable;
            echo "<br/>Mi variable vale $miVariable";
        ?>
    </h1>
    <h2><?= $miVariable ?> </h2>

    <p>
        <?php
            $nombre = "Ana";
            echo "La primera letra es {$nombre[0]} y la última {$nombre[-1]}<br>";

            $variableBooleana = false;

            const PI = 3.1416;

            echo PI,"<br/>";
            //PI = 4;

            define('MAYOR_EDAD', 18);

            echo MAYOR_EDAD,"<br/>";

            $v1 = 8;
            $v2 = 8.0;

            echo $v1 == $v2?'true':'false';
            echo $v1 === $v2?'true':'false';

        ?>
    </p>
</body>
</html>