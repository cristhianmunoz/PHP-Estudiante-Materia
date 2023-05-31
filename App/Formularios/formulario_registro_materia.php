<!-- formulario_registro_materia.php -->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Materia</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container mt-5">
    <form method="POST" action="../Procesar/procesar_registro_materia.php">
      <h2 class="mb-4">Registro de Materia</h2>

      <div class="form-group">
        <label for="nombre">Nombre de la materia:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>

      <div class="form-group">
        <label for="codigo">Código de la materia:</label>
        <input type="text" class="form-control" id="codigo" name="codigo" required>
      </div>

      <button type="submit" class="btn btn-primary">Registrar Materia</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
