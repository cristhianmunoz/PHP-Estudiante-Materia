<?php
$servername = "localhost:3306";
$username = "root";
$password = "MyserCriss2023root";
$database = "mydb_php";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
?>

<?php
// Conexión a la base de datos (repite el código de conexión aquí)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se seleccionaron materias
    if (isset($_POST['materias']) && !empty($_POST['materias'])) {
        $materias = $_POST['materias'];
        $estudianteId = 1; // Aquí debes obtener el ID del estudiante actual (puedes pasarlo a través de una sesión o como un parámetro)

        // Insertar las relaciones en la tabla "estudiantes_materias"
        foreach ($materias as $materiaId) {
            $sql = "INSERT INTO estudiantes_materias (id_estudiante, id_materia) VALUES ($estudianteId, $materiaId)";
            if ($conn->query($sql) !== TRUE) {
                echo "Error al inscribirse en la materia con ID: " . $materiaId;
            }
        }

        echo "Inscripción exitosa!";
    } else {
        echo "Por favor, seleccione al menos una materia.";
    }
}

$conn->close();
?>