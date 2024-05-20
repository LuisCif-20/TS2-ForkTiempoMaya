<?php session_start(); ?>
<?php

$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$nahualNorte = include "codigo_funcionalidades/calcularNahualNorte.php";
$nahualSur = include "codigo_funcionalidades/calcularNahualSur.php";
$nahualDerecho = include "codigo_funcionalidades/calcularNahualDerecho.php";
$nahualIzquierdo = include "codigo_funcionalidades/calcularNahualIzquierdo.php";
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$cholquij = $nahual . " " . strval($energia);
$img_nahual = include 'backend/buscar/conseguir_imagen_nahual.php';
$img_nahual = substr($img_nahual, 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Conversion Cuenta Larga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/fondo-hora.css">
</head>

<body>

    <?php include "./NavBar.php" ?>
    <div>
        <section id="inicio" class="flex">
            <div id="fondoHora"></div>
            <script src="./js/cambiarFondo.js"></script>
            <div id="inicioContainer" class="inicio-container">
                <div id="formulario" style="margin-top: 150px;">
                    <h1>Conoce Tu Cruz Maya</h1>
                    <form action="#" method="GET" class="row mt-3">
                        <div class="mb-1 col-8 offset-2">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>">
                        </div>
                        <div class="col-8 offset-2">
                            <button type="submit" class="btn btn-get-started">Conocer</button>
                        </div>
                        
                    </form>
                    <div class="row">
                        <div class="col-12 d-flex flex-column align-items-center">
                            <strong>
                                <u><?php echo isset($nahualNorte['nombre']) ? $nahualNorte['nombre'] : ''; ?></u>
                            </strong>
                            <img width="100" height="100" class="rounded"
                                src="<?php echo isset($nahualNorte['imagen']) ? $nahualNorte['imagen'] : ''; ?>">
                        </div>
                        <div class="col-4 d-flex flex-column align-items-center">
                            <strong>
                                <u><?php echo isset($nahualIzquierdo['nombre']) ? $nahualIzquierdo['nombre'] : ''; ?></u>
                            </strong>
                            <img width="100" height="100" class="rounded"
                                src="<?php echo isset($nahualIzquierdo['imagen']) ? $nahualIzquierdo['imagen'] : ''; ?>">
                        </div>
                        <div class="col-4 d-flex flex-column align-items-center">
                            <strong>
                                <u><?php echo isset($cholquij) ? $cholquij : ''; ?></u>
                            </strong>
                            <img width="100" height="100" class="rounded"
                                src="<?php echo isset($img_nahual) ? $img_nahual : ''; ?>">
                        </div>
                        <div class="col-4 d-flex flex-column align-items-center">
                            <strong>
                                <u><?php echo isset($nahualDerecho['nombre']) ? $nahualDerecho['nombre'] : ''; ?></u>
                            </strong>
                            <img width="100" height="100" class="rounded"
                                src="<?php echo isset($nahualDerecho['imagen']) ? $nahualDerecho['imagen'] : ''; ?>">
                        </div>
                        <div class="col-12 d-flex flex-column align-items-center">
                            <strong>
                                <u><?php echo isset($nahualSur['nombre']) ? $nahualSur['nombre'] : ''; ?></u>
                            </strong>
                            <img width="100" height="100" class="rounded"
                                src="<?php echo isset($nahualSur['imagen']) ? $nahualSur['imagen'] : ''; ?>">
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