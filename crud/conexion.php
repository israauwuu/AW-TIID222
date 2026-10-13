<?php
    /* Creacion de una funcion llamada conectar */
    function conectar(){
        /* informacion del servidor */
        $host="localhost";
        $user="root";
        $pass="";
        /* base de datos */
        $db="aw_crud";

        $con=mysqli_connect($host,$user,$pass);

        mysqli_select_db($con,$db);

        return $con;
    }
?>