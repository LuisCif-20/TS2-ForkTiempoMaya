<?php session_start(); ?>
<?php

include './codigo_funcionalidades/conversor.php';

if (isset($_GET['fecha_gregoriana'])) {
    $resultado_cl_to_cg = $_GET['fecha_gregoriana'];
} else {
    date_default_timezone_set('US/Central');
    $resultado_cl_to_cg = date("Y-m-d");
}

if (isset($_GET['baktun'])) {
    $res_baktun = $_GET['baktun'];
} else {
    $res_baktun = '';
}

if (isset($_GET['katun'])) {
    $res_katun = $_GET['katun'];
} else {
    $res_katun = '';
}

if (isset($_GET['tun'])) {
    $res_tun = $_GET['tun'];
} else {
    $res_tun = '';
}

if (isset($_GET['uinal'])) {
    $res_uinal = $_GET['uinal'];
} else {
    $res_uinal = '';
}

if (isset($_GET['kin'])) {
    $res_kin = $_GET['kin'];
} else {
    $res_kin = '';
}

// Procesamiento del formulario para CL a CG
if (isset($_GET['submit_cl_to_cg'])) {
    $baktun = $_GET['baktun'];
    $katun = $_GET['katun'];
    $tun = $_GET['tun'];
    $uinal = $_GET['uinal'];
    $kin = $_GET['kin'];
    $resultado_cl_to_cg = convertir_CL_a_CG($baktun, $katun, $tun, $uinal, $kin);
}

// Procesamiento del formulario para CG a CL
if (isset($_GET['submit_cg_to_cl'])) {
    $fecha = $_GET['fecha_gregoriana'];
    $resultado_cg_to_cl = convertir_CG_a_CL($fecha);
    $res_baktun = $resultado_cg_to_cl['baktun'];
    $res_katun = $resultado_cg_to_cl['katun'];
    $res_tun = $resultado_cg_to_cl['tun'];
    $res_uinal = $resultado_cg_to_cl['uinal'];
    $res_kin = $resultado_cg_to_cl['kin'];
}

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
                <div id="formulario" style="margin-top: 70px;">
                    <h1>Juega con el Conversor</h1>
                    <form action="#" method="GET" class="flex row justify-content-center">
                        <div class="col-2">
                            <label for="baktun" class="form-label">Baktun</label>
                            <input type="number" min="0" name="baktun" id="baktun" class="form-control" required
                                value="<?php echo isset($res_baktun) ? $res_baktun : ''; ?>">
                        </div>
                        <div class="col-2">
                            <label for="katun" class="form-label">Katun</label>
                            <input type="number" min="0" name="katun" id="katun" class="form-control" required
                                value="<?php echo isset($res_katun) ? $res_katun : ''; ?>">
                        </div>
                        <div class="col-2">
                            <label for="tun" class="form-label">Tun</label>
                            <input type="number" min="0" name="tun" id="tun" class="form-control" required
                                value="<?php echo isset($res_tun) ? $res_tun : ''; ?>">
                        </div>
                        <div class="col-2">
                            <label for="uinal" class="form-label">Uinal</label>
                            <input type="number" min="0" name="uinal" id="uinal" class="form-control" required
                                value="<?php echo isset($res_uinal) ? $res_uinal : ''; ?>">
                        </div>
                        <div class="col-2">
                            <label for="kin" class="form-label">Kin</label>
                            <input type="number" min="0" name="kin" id="kin" class="form-control" required
                                value="<?php echo isset($res_kin) ? $res_kin : ''; ?>">
                        </div>
                        <div class="col-12 justify-content-center mt-3">
                            <button type="submit" name="submit_cl_to_cg" class="btn btn-get-started">Convertir Cuenta
                                Larga a Gregoriano</button>
                        </div>
                    </form>
                    <form action="#" method="GET" class="flex row justify-content-center mt-3">
                        <div class="col-5">
                            <label for="baktun" class="form-label">Fecha Gregoriana</label>
                            <input type="date" name="fecha_gregoriana" id="fecha_gregoriana" class="form-control"
                                required value="<?php echo isset($resultado_cl_to_cg) ? $resultado_cl_to_cg : ''; ?>">
                        </div>
                        <div class="col-12 justify-content-center mt-3">
                            <button type="submit" name="submit_cg_to_cl" class="btn btn-get-started">Convertir
                                Gregoriano a Cuenta Larga</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <br><br>
    </div>

    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>