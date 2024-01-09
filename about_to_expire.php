<?php
$jsonData = file_get_contents("sources/db/polices.json");
$clientes = json_decode($jsonData, true);

if ($clientes && isset($clientes['clientes'])) {
  $clientes = $clientes['clientes'];
} else {
  $clientes = [];
}

function compararFechas($a, $b)
{
  return strtotime($a['proximoPago']) - strtotime($b['proximoPago']);
}

usort($clientes, 'compararFechas');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
  <link rel="stylesheet" href="sources/styles/footer.css">
  <title>Pólizas Próximas a Vencer</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Qualiagenda</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="about_to_expire.php">Próximas a Vencer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portfolio.php">Cartera</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>


  <div class="container mt-4">
    <h2>Pólizas Próximas a Vencer</h2>
    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Número de Póliza</th>
          <th scope="col">Nombre</th>
          <th scope="col">Próximo Pago</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $cliente) : ?>
          <tr>
            <th scope="row"><?php echo $cliente['id']; ?></th>
            <td><?php echo $cliente['poliza']; ?></td>
            <td><?php echo $cliente['nombre']; ?></td>
            <td><?php echo $cliente['proximoPago']; ?></td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#cambiarFechaModal<?php echo $cliente['id']; ?>">Cambiar Fecha</button>
              <button type="button" class="btn btn-danger">Eliminar</button>
            </td>
          </tr>

          <div class="modal fade" id="cambiarFechaModal<?php echo $cliente['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="cambiarFechaModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="cambiarFechaModalLabel">Cambiar Fecha de Vencimiento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="dateUpdate.php"> <!-- Cambiado el atributo action -->
                    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                    <div class="form-group">
                      <label for="nuevaFecha">Nueva Fecha de Vencimiento:</label>
                      <input type="date" class="form-control" id="nuevaFecha" name="nuevaFecha" placeholder="Ingrese la nueva fecha" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p>&copy; 2023 made by <a href="https://github.com/ManuNunez">Manuel Nuñez</a></p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>