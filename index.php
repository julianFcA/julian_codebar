<?php
require_once("./database/conn.php");
$db = new database();
$conn = $db->conectar();

require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;


$usua = $conn->prepare("SELECT * FROM automovil");
$usua->execute();
$asigna = $usua->fetchAll(PDO::FETCH_ASSOC);

if ((isset($_POST["registro"])) && ($_POST["registro"] == "formu")) {
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $dueño = $_POST['dueño'];


    $cod_bar = uniqid() . rand(1000, 9999);

    $generator = new BarcodeGeneratorPNG();
    $codigo_barras_imagen = $generator->getBarcode($cod_bar, $generator::TYPE_CODE_128);

    file_put_contents(__DIR__ . '/images/' . $cod_bar . '.png', $codigo_barras_imagen);

    $insertsql = $conn->prepare("INSERT INTO automovil(placa, cod_bar, marca, dueño) VALUES (?, ?, ?, ?)");
    $insertsql->execute([ $placa, $cod_bar, $marca, $dueño]);
    echo '<script>alert("Exito: Registro Exitoso, Gracias por Registrar el Carro");</script>';
    echo '<script>window.location= "./index.php";</script>';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
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

            .contenedor-angosto {
            max-width: 600px; /* Ajusta el ancho según tus necesidades */
            margin: 0 auto; /* Centra el contenedor */
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

    <main class="contenedor-angosto sombra">
        <div class="container mt-5">
            <h2>Registro Automovil</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Placa</label>
                    <input type="text"  placeholder="Ingrese Placa" class="form-control" id="placa" name="placa" required >
                </div>
                <div class="form-group">
                    <label for="nombre">Marca</label>
                    <input type="text"  placeholder="Ingrese Marca" class="form-control" id="marca" name="marca" required >
                </div>
                <div class="form-group">
                    <label for="nombre">Dueño</label>
                    <input type="text"  placeholder="Ingrese Dueño" class="form-control" id="dueño" name="dueño" required >
                </div>
                <input type="submit" class="btn btn-primary" value="Registrar">
                <input type="hidden" name="registro" value="formu">
            </form>
    </main>
   
</body>

</html>
