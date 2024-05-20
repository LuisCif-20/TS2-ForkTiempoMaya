<?php session_start(); ?>
<?php

$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$img_nahual = include 'backend/buscar/conseguir_imagen_nahual.php';
$img_nahual = substr($img_nahual, 1);
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$img_uinal = include 'backend/buscar/conseguir_imagen_uinal.php';
$img_uinal = substr($img_uinal, 1);
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$cholquij = $nahual . " " . strval($energia);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/fondo-hora.css">
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio" class="flex">
            <div id="fondoHora"></div>
            <script src="./js/cambiarFondo.js"></script>
            <div id="inicioContainer" class="inicio-container">

                <div id='formulario' style="margin-top: 150px;">
                    <h1>Calculadora</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>

                    <div id="tabla">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Calendario</th>
                                    <th scope="col" style="width: 60%;">Fecha</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Calendario Haab</th>
                                    <td class="row">
                                        <strong class="col-3">
                                            <u><?php echo isset($haab) ? $haab : ''; ?></u>
                                        </strong>
                                        <img width="100" height="100" class="rounded ml-5 col-3"
                                            src="<?php echo isset($img_uinal) ? $img_uinal : ''; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Calendario Cholquij</th>
                                    <td class="row">
                                        <strong class="col-3">
                                            <u><?php echo isset($cholquij) ? $cholquij : ''; ?></u>
                                        </strong>
                                        <img width="100" height="100" class="rounded ml-5 col-3"
                                            src="<?php echo isset($img_nahual) ? $img_nahual : ''; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Cuenta Larga</th>
                                    <td class="row">
                                        <strong class="col-3">
                                            <u><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></u>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
    </div>
    </section>
    <br><br>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>