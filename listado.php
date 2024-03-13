<?php
require_once("./database/conn.php");
$db = new database();
$conn = $db->conectar();

require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

$usua = $conn->prepare("SELECT * FROM automovil");
$usua->execute();
$asigna = $usua->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .fondo {
                background-color: #fff;
                color: #000; /* Cambia el color del texto si es necesario */
            }

            .formulario-azul {
                background-color: #007bff;
                color: #ffffff; /* Cambia el color del texto si es necesario */
                padding: 20px;
                border-radius: 10px;
                margin-top: 20px;
            }

            .tabla-azul-claro {
                background-color: #c7e0f7;
                color: #000000; /* Cambia el color del texto si es necesario */
            }

            .btn-personalizado {
                background-color: #28a745; /* Verde */
                border-color: #28a745; /* Verde */
            }

            /* Nuevos estilos para el menú */
            .custom_nav-container {
                background-color: #000; /* Fondo blanco */
            }

            .navbar-nav .nav-link {
                color: #ffffff !important; /* Letras blancas */
            }
        </style>
        <title>Automovil</title>
    </head>
    <body class="fondo">
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="./index.php">Registro de Automovil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./listado.php">Listado de Registro</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="contenedor sombra">

            <div class="container mt-3">
                <table class="table table-striped table-bordered table-hover tabla-azul-claro">
                    <thead class="thead-dark">
                            <tr style="text-transform: uppercase;">
                                <th>Placa</th>
                                <th>Codigo de barras</th>
                                <th>Marca</th>
                                <th>Dueño</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($asigna as $usua) { ?>
                                <tr>
                                    <td><?= $usua["placa"] ?></td>
                                    <td><img src="images/<?= $usua["cod_bar"] ?>.png" style="max-width: 300px; height: auto; border: 2px solid #ffffff;"></td>
                                    <td><?= $usua["marca"] ?></td>
                                    <td><?= $usua["dueño"] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </main>
    </body>
</html>