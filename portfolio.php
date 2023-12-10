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
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <div class="col-md-6 text-md-right">
                <button class="btn btn-success" id="agregarBtn" data-toggle="modal" data-target="#agregarModal">Agregar</button>
            </div>
        </div>
        <br><br><br>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Poliza</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Cantidad de Pagos</th>
                    <th scope="col">Progreso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Nombre1</td>
                    <td>Poliza1</td>
                    <td>Fecha1</td>
                    <td>111111</td>
                    <td>3</td>
                    <td>80%</td>
                </tr>

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
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Nuevo Elemento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre : </label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre">
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="poliza">Poliza : </label>
                            <input type="text" class="form-control" id="poliza" placeholder="Ingrese la poliza">
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de Vencimiento : </label>
                            <input type="date" class="form-control" id="fecha" placeholder="Ingrese la fecha">
                        </div>
                        <div class="form-group">
                            <label for="tipoPago">Tipo de Pago : </label>
                            <select class="form-control" id="tipoPago">
                                <option value="anual">Anual</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="semestral">Semestral</option>
                            </select>
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
    <script src="sources/scripts/new_client.js"></script>

</body>

</html>