<?php
    include("conexion.php");

    $con=conectar();
    $sql="SELECT * FROM carros";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<style>
    table, th{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>

    <div class = "encabezado" style="background-color: lightblue; padding: 20px; text-align: center;">
        <h1>EXAMEN 1ER PARCIAL - APLICACIONES WEB</h1>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr;gap: 30px;">
        <div style="background-color: lightgreen; padding: 20px;">
            <h1>Tabla de carros</h1>
            <table border="2">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio</th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                         while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['marca']?></td>
                        <td><?php echo $row['modelo']?></td>
                        <td><?php echo $row['anio']?></td>
                        <td><?php echo $row['precio']?></td>
                    </tr>
                    <?php
                            }
                    ?> 
                </tbody>
            </table>
        </div>

        <div style="background-color: lightyellow; padding: 20px;">
        
            <h1>formulario de carros</h1>

            <form action="insertar.php" method="POST">
               
                <div style="display: flex; gap:10px;">
                    <input type="text" class="form-control" name="id" placeholder="id">
                    <input type="text" class="form-control" name="marca" placeholder="marca">
                    <input type="text" class="form-control" name="modelo"  placeholder="modelo">
                    <input type="text" class="form-control" name="anio" placeholder="año">
                    <input type="text" class="form-control" name="precio" placeholder="precio">
                </div> 

            <button type="submit">Guardar</button>

            </form>
            
    </div>


    </div>

    <div style="background-color: lightgray; padding: 20px;">
        <div style="display: grid; grid-template-columns: 1fr 3fr;gap: 30px;">
            <div>
                <a href="Grid y Flex.pdf" >Ver PDF</a>
            </div>
            <div>
                <a href="Practica No.1.pdf" >Ver PDF</a>
            </div>
            <div>
                <a href="R1-HTML+CSS+BOX MODEL.pdf" >Ver PDF</a>
            </div>
        </div>
    </div>

</body>
</html>
