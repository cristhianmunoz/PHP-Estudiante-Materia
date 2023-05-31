<!-- formulario_registro_curso.php -->

<?php
$servername = "localhost:3306";
$username = "root";
$password = "MyserCriss2023root";
$database = "mydb_php";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener la lista de todas las materias
$queryMaterias = "SELECT * FROM materia";
$resultMaterias = $conn->query($queryMaterias);

// Obtener la lista de todos los estudiantes
$queryEstudiantes = "SELECT * FROM estudiante";
$resultEstudiantes = $conn->query($queryEstudiantes);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Curso</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container mt-5">
    <h2>Registro de Curso</h2>
    <form action="../Procesar/procesar_resgistro_curso.php" method="POST">
      <div class="form-group">
        <label for="nombre">Nombre del Curso:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label>Materia:</label>
        <?php
        while ($rowMateria = $resultMaterias->fetch_assoc()) {
          $idMateria = $rowMateria['idMateria'];
          $nombreMateria = $rowMateria['nombreM'];
          echo '<div class="form-check">';
          echo '<input class="form-check-input" type="radio" name="materia" id="materia' . $idMateria . '" value="' . $idMateria . '">';
          echo '<label class="form-check-label" for="materia' . $idMateria . '">' . $nombreMateria . '</label>';
          echo '</div>';
        }
        ?>
      </div>
      <div class="form-group">
        <label>Estudiantes:</label>
        <?php
        while ($rowEstudiante = $resultEstudiantes->fetch_assoc()) {
          $idEstudiante = $rowEstudiante['idEstudiante'];
          $nombreEstudiante = $rowEstudiante['nombreE'];
          $apellidoEstudiante = $rowEstudiante['apellidoE'];
          echo '<div class="form-check">';
          echo '<input class="form-check-input" type="checkbox" name="estudiantes[]" id="estudiante' . $idEstudiante . '" value="' . $idEstudiante . '">';
          echo '<label class="form-check-label" for="estudiante' . $idEstudiante . '">' . $nombreEstudiante . ' ' . $apellidoEstudiante . '</label>';
          echo '</div>';
        }
        ?>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.
