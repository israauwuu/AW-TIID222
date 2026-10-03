<?php
    /* Incluimos el archivo donde hicimos la conexion */
    include ("conexion.php");
  
    /* Mandamos llamar la funcion conectar */
    $con=conectar();

    /* Recibimos la info del formulario */
    $matricula=$_POST['matricula'];
    $nombre=$_POST['nombre'];   
    $apellido_p=$_POST['apellido_p'];
    $apellido_m=$_POST['apellido_m'];
    $edad=$_POST['edad'];

    /* Construimos la consulta para insertar la informacion en nuestra base de datos */
    $sql="INSERT INTO alumnos(matricula, nombre, apellido_p, apellido_m, edad)
    VALUES('$matricula','$nombre','$apellido_p','$apellido_m','$edad')";

    /* Ejecutamos la consulta */
    $query=mysqli_query($con,$sql);

    /* Comprobamos si se inserto o no al alumno */
    if ($query){
        header("location: alumnos.php");
    }else{
        echo "Error al insertar al alumno";
    }



?>