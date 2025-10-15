<?php

//Desordeno el orden de las columnas para que salga de manera aleatoria
//las columnas con 2 números y las columnas con 1
$columnas = [0,1,2,3,4,5,6,7,8];
shuffle($columnas);

//Defino los números de cada columna. Tiene que haber 6 con 2 y 3 con 1
for($i=0;$i<9;$i++){
        $ocupados_por_numero[$columnas[$i]] = $i < 6?2:1;
}

//Defino el array que va a tener los números de las columnas del cartón
$numeros = [];

for($i=0;$i<9;$i++){

    $inicio = $i == 0?1:10*$i;
    $fin = $i == 8?90:$inicio + 9;

    $diferentes = 0;
    $numeros[$i] = [];
    while($diferentes < $ocupados_por_numero[$i]){
        $numero = rand($inicio, $fin);
        if(!in_array( $numero, $numeros[$i])){
            $numeros[$i][] = $numero;
            $diferentes++;
        }
    }
    sort($numeros[$i]);
}

//var_dump($numeros);

$carton = [];

/****************** FILA 1 ******************************************/
//En la primera fila cojo cuatro columnas al azar para pintar de negro
$negras = [0,1,2,3,4,5,6,7,8];
shuffle($negras);
$negras = array_slice($negras, 0, 4);

rellenarFila(0, $numeros, $negras, $carton);

/****************** FILA 2 ******************************************/
//Para la segunda fila meto como posibles negras las columnas a las que les quedan un 
//número y las mezclo para que estén en orden aleatorio
$negras = [];
for($i=0;$i<9;$i++){
    if(count($numeros[$i]) == 1){
        $negras[] = $i;
    }
}
shuffle($negras);

//Introduzco ahora los que no tienen ningún número porque seguro que tienen que ir negras
//y los coloco al principio de los candidatos para darle prioridad
for($i=0;$i<9;$i++){
    if(count($numeros[$i]) == 0){
        array_unshift($negras, $i);
    }
}

//Me quedo con las 4 primeras columnas
$negras = array_slice($negras, 0, 4);

rellenarFila(1, $numeros, $negras, $carton);

/**************  FILA 3 *********************/
/* las negras son aquellas que ya no hay números que rellenar en esa columna */
$negras = [];
for($i=0;$i<9;$i++){
    if(count($numeros[$i]) == 0){
        $negras[] = $i;
    }
}
rellenarFila(2, $numeros, $negras, $carton);


function rellenarFila($fila, &$numeros, $negras, &$carton){
    for($i=0;$i<9;$i++){
        if(in_array($i, $negras)){
            $carton[$fila][$i] = 'X';
        }else{
            $carton[$fila][$i] = $numeros[$i][0];
            unset($numeros[$i][0]);
            $numeros[$i] = array_values($numeros[$i]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bingo</title>
</head>
<body>
    <table>
    <?php
    for($i=0;$i<3;$i++){
        echo "<tr>";
        for($j=0;$j<9;$j++){
            
            if($carton[$i][$j] === 'X'){
                echo "<td class ='relleno'></td>";
            }else{
                echo "<td class ='vacio'>{$carton[$i][$j]}</td>";
            }
        }
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>