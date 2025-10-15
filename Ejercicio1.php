<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 Ejercicio 1</title>
</head>
<body>
    <?php
    /*Define una constante con el valor de la gravedad terrestre (9.8). Luego, crea una
    variable que almacene la masa de un objeto y calcula su peso multiplicando la masa por la
    constante de gravedad. Muestra el resultado.*/

    define ('GRAVEDAD', 9.8);
    $masa = 8;

    $peso = GRAVEDAD * $masa;

    echo "Tú peso en la tierra es $peso";
    ?>
</body>
</html>