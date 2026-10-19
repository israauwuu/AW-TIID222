<?php 
#Incluimos el archivo donde hicimos la conexion
include("conexion.php");

#Mandamos llamar la funcion conectar
$con=conectar();

#recibimos la matricula enviada por la URL
$matricula=$_GET['matricula'];

#eliminamos al alumno de la tabla
$sql="DELETE FROM alumnos WHERE matricula='$_GET[matricula]'";
$query=mysqli_query($con,$sql);

#comprobamos si se elimino al alumno
 if ($query){
        header("location: alumnos.php");
        exit();
    }else{
        echo "Error al aliminar al alumno: " .mysqli_error($con);
    }
?>
