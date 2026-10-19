
<?php
    // Incluimos la conexion
    include("conexion.php");

    // Nos conectamos a la base de datos
    $con = conectar();

    // Recibimos los datos del formulario
    $matricula_original = $_POST['matricula_original'];
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

    // Actualizamos los datos del alumno
    $sql = "UPDATE alumnos SET
            matricula = ?,
            nombre = ?,
            apellido_p = ?,
            apellido_m = ?,
            edad = ?
            WHERE matricula = ?";

    // Preparamos la consulta
    $query = mysqli_prepare($con, $sql);

    // Enviamos los datos a la consulta
    mysqli_stmt_bind_param(
        $query,
        "ssssss",
        $matricula,
        $nombre,
        $apellido_p,
        $apellido_m,
        $edad,
        $matricula_original
    );

    // Ejecutamos la consulta
    if (mysqli_stmt_execute($query)) {
        header("Location: alumnos.php");
        exit();
    } else {
        echo "Error al actualizar al alumno: " . mysqli_error($con);
    }
?>
