<?php
    /* Aqui decimos que se incluya la informacion de el archivo conexion */
    include("conexion.php");

   /*  mandamos llamas la funcion conectar */
    $con=conectar();

   /*  Seleccionamos todo de la tabla alumnos */
    $sql="SELECT * FROM alumnos";

    $query=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table, th{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <table> 
        <tr>
            <th>matricula</th>
            <th>nombre</th>
            <th>apellido_p</th>
            <th>apellido_m</th>
            <th>edad</th>
        </tr>

    </table>
</body>
</html>