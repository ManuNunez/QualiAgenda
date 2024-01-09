<?php
$jsonData = file_get_contents("sources/db/polices.json");
$clientes = json_decode($jsonData, true);

if ($clientes && isset($clientes['clientes'])) {
    $clientes = $clientes['clientes'];
} else {
    $clientes = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nombre']) && isset($_POST['poliza']) && isset($_POST['proximoPago'])) {
        $jsonData = file_get_contents("sources/db/polices.json");
        $clientes = json_decode($jsonData, true);

        $nuevoCliente = [
            'id' => count($clientes['clientes']) + 1,
            'nombre' => $_POST['nombre'],
            'poliza' => $_POST['poliza'],
            'proximoPago' => $_POST['proximoPago'],
        ];

        $clientes['clientes'][] = $nuevoCliente;

        $jsonData = json_encode($clientes, JSON_PRETTY_PRINT);
        file_put_contents("sources/db/polices.json", $jsonData);

        // Redirigir a index.php después de guardar
        header("Location: index.php");
        exit(); // Asegurar que el script se detenga después de la redirección
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="sources/styles/footer.css">
    <title>QualiAgenda</title>
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
        <div class="row">
            <div class="col-md-6">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar por número de póliza" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-md-right">
                <button class="btn btn-success" id="agregarBtn" data-toggle="modal" data-target="#agregarModal">Agregar</button>
            </div>
        </div>
        <br><br><br>
        <table class="table mt-4" id="clientesTabla">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Número de Póliza</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Próximo Pago</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                foreach ($clientes as $cliente) {
                    // Verifica si el número de póliza contiene el término de búsqueda
                    if (stripos($cliente['poliza'], $searchTerm) !== false || empty($searchTerm)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $cliente['id']; ?></th>
                            <td><?php echo $cliente['poliza']; ?></td>
                            <td><?php echo $cliente['nombre']; ?></td>
                            <td><?php echo $cliente['proximoPago']; ?></td>
                            <td><button type="button" class="btn btn-danger">eliminar</button></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2023 made by <a href="https://github.com/ManuNunez">Manuel Nuñez</a></p>
        </div>
    </footer>

    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Nuevo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="poliza">Número de Póliza:</label>
                            <input type="text" class="form-control" id="poliza" name="poliza" placeholder="Ingrese el número de póliza" required>
                        </div>
                        <div class="form-group">
                            <label for="proximoPago">Próximo Pago:</label>
                            <input type="date" class="form-control" id="proximoPago" name="proximoPago" placeholder="Ingrese la fecha del próximo pago" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
