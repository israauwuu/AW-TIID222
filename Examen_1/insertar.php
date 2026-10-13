<?php
    include("conexion.php");

    $con=conectar();

    $id=$_POST['id'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $anio=$_POST['anio'];
    $precio=$_POST['precio'];

    $sql="INSERT INTO carros(id, marca, modelo, anio, precio)
    VALUES('$id', '$marca', '$modelo', '$anio', '$precio')"; 

    $query=mysqli_query($con,$sql);

     if ($query){
        header("location: carros.php");
    }else{
        echo "Error al insertar el carro";
    }
?>