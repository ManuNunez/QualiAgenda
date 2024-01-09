<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jsonData = file_get_contents("sources/db/polices.json");
    $clientes = json_decode($jsonData, true);

    if ($clientes && isset($clientes['clientes'])) {
        $clientes = $clientes['clientes'];
    } else {
        $clientes = [];
    }

    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nuevaFecha = isset($_POST['nuevaFecha']) ? $_POST['nuevaFecha'] : null;

    if ($id !== null && $nuevaFecha !== null) {
        // Buscar la póliza por ID
        foreach ($clientes as &$cliente) {
            if ($cliente['id'] == $id) {
                // Actualizar la fecha de vencimiento
                $cliente['proximoPago'] = $nuevaFecha;
                break;
            }
        }

        // Guardar los cambios en el archivo JSON
        $jsonData = json_encode(['clientes' => $clientes], JSON_PRETTY_PRINT);
        file_put_contents("sources/db/polices.json", $jsonData);

        // Redirigir a la página about_to_expire.php después de guardar
        header("Location: about_to_expire.php");
        exit();
    }
}

// Si no se envió un método POST o faltan parámetros, redirigir a la página about_to_expire.php
header("Location: about_to_expire.php");
exit();
