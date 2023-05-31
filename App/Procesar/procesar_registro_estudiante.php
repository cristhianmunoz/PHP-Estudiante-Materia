<!-- procesar_registro_curso.php -->

<?php
// Código de conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "nombre_de_tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<!-- procesar_registro_materia.php -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreCurso = $_POST['nombre'];
    $idMateria = $_POST['idmateria'];
    $estudiantesSeleccionados = $_POST['estudiantes'];

    // Insertar el curso en la base de datos
    $queryInsertCurso = "INSERT INTO cursos (nombre, id_materia) VALUES ('$nombreCurso', '$idMateria')";
    $resultInsertCurso = $conn->query($queryInsertCurso);

    if ($resultInsertCurso) {
        // Obtener el ID del curso recién insertado
        $idCurso = $conn->insert_id;

        // Insertar los estudiantes seleccionados en la tabla de inscripciones
        foreach ($estudiantesSeleccionados as $idEstudiante) {
            $queryInsertInscripcion = "INSERT INTO inscripciones (id_curso, id_estudiante) VALUES ('$idCurso', '$idEstudiante')";
            $resultInsertInscripcion = $conn->query($queryInsertInscripcion);
        }

        if ($resultInsertInscripcion) {
            echo "El curso se ha registrado correctamente.";
        } else {
            echo "Error al registrar los estudiantes en el curso.";
        }
    } else {
        echo "Error al registrar el curso.";
    }
}

$conn->close();

header("Location: ../inicio.php");
exit;
?>
