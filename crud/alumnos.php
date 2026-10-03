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
    <div style="display: grid; grid-template-columns: 2fr 1fr;gap: 30px;">
        <div>
            <h1>TABLA DE ALUMNOS</h1>
            <table border="2"> 
                <thead>
                    <tr>
                        <th>matricula</th>
                        <th>nombre</th>
                        <th>apellido_p</th>
                        <th>apellido_m</th>
                        <th>edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['matricula']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['apellido_p']?></td>
                        <td><?php echo $row['apellido_m']?></td>
                        <td><?php echo $row['edad']?></td>
                    </tr>
                    <?php
                            }
                    ?> 
                    
                </tbody>
            </table>
        </div>

        <div>
            <h1>FORMULARIO DE ALUMNOS</h1>
            <form action="insertar.php" method="POST">
               
                <div style="display: flex; gap:10px;">
                    <input type="text" class="form-control" name="matricula" placeholder="matricula">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre">
                    <input type="text" class="form-control" name="apellido_p"  placeholder="apellido_p">
                    <input type="text" class="form-control" name="apellido_m" placeholder="apellido_m">
                    <input type="text" class="form-control" name="edad" placeholder="edad">
                </div> 

            <button type="submit">Guardar</button>

            </form>
        </div>
</body>
</html>
