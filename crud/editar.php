
<?php
    // Incluimos la conexion
    include("conexion.php");

    // Nos conectamos a la base de datos
    $con = conectar();

    // Recibimos la matricula de la URL
    $matricula = $_GET['matricula'];

    // Buscamos al alumno
    $sql = "SELECT * FROM alumnos WHERE matricula = '$matricula'";

    $query = mysqli_query($con, $sql);

    // Guardamos los datos del alumno
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar alumno</title>
</head>
<body>

    <h1>EDITAR ALUMNO</h1>

    <form action="actualizar.php" method="POST">

        <!-- Guardamos la matricula original -->
        <input type="hidden" name="matricula_original"
               value="<?php echo htmlspecialchars($row['matricula']); ?>">

        <input type="text" name="matricula"
               value="<?php echo htmlspecialchars($row['matricula']); ?>"
               placeholder="Matricula" required>

        <input type="text" name="nombre"
               value="<?php echo htmlspecialchars($row['nombre']); ?>"
               placeholder="Nombre" required>

        <input type="text" name="apellido_p"
               value="<?php echo htmlspecialchars($row['apellido_p']); ?>"
               placeholder="Apellido paterno" required>

        <input type="text" name="apellido_m"
               value="<?php echo htmlspecialchars($row['apellido_m']); ?>"
               placeholder="Apellido materno" required>

        <input type="number" name="edad"
               value="<?php echo htmlspecialchars($row['edad']); ?>"
               placeholder="Edad" required>

        <button type="submit">Guardar cambios</button>

    </form>

</body>
</html>
