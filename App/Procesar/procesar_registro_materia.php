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

<!-- procesar_registro_materia.php -->

<?php
// Código de conexión a la base de datos (repite el código de conexión aquí)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];

    // Insertar la materia en la tabla "materias"
    $sql = "INSERT INTO materia (nombreM, idMateria) VALUES ('$nombre', '$codigo')";
    if ($conn->query($sql) === TRUE) {
        echo "Materia registrada exitosamente!";
    } else {
        echo "Error al registrar la materia: " . $conn->error;
    }
}

$conn->close();
header("Location: ../inicio.php");
exit;
?>
