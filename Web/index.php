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
$desc = include 'backend/buscar/conseguir_des_nahual.php';
$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$cholquij = $nahual . " " . strval($energia);                  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Tiempo Maya</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php include "blocks/bloquesCss.html" ?>
  <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/fondo-hora.css">
</head>

<body>
  <?php include "NavBar.php" ?>
  <div>
    <section id="inicio">
      <div id="fondoHora"></div>
      <script src="./js/cambiarFondo.js"></script>
      <!-- <video src="./img/background.mp4" autoplay="true" muted="true" loop="true"></video> -->
      <div id="inicioContainer" class="inicio-container">
        <br><br><br><br><br>
        <h1><br><br>Tiempo Maya</h1><br><br>
        <img alt="" src="./img/logonew2.png" width=185 height="160">
        <div class="row mt-3" style="width: 1200px">
          <div class="col-3">
            <h5 style="color: whitesmoke;font-size: 18px;">Calendario Haab : <?php echo isset($haab) ? $haab : ''; ?></h5>
            <img width="100" height="100" class="rounded" src="<?php echo isset($img_uinal) ? $img_uinal : ''; ?>">
          </div>
          <div class="col-6">
            <h5 style="color: whitesmoke;font-size: 18px;"><?php echo isset($desc) ? $desc : ''; ?></h5>
          </div>
          <div class="col-3 mb-5">
            <h5 style="color: whitesmoke;font-size: 18px;">Calendario Cholquij : <?php echo isset($cholquij) ? $cholquij : ''; ?></h5>
            <img width="100" height="100" class="rounded" src="<?php echo isset($img_nahual) ? $img_nahual : ''; ?>">
          </div>
          <h5 class="col-6" style="color: whitesmoke;font-size: 18px;">Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
          <h5 class="col-6" style="color: whitesmoke;font-size: 18px;">Fecha Gregoriana: <?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></h5>
        </div>
      </div>
    </section>
    <br><br><br><br>
    <section id="information">
      <div class="container">
        <div class="row about-container">
          <div class="section-header">
            <h3 class="section-title">Acerca de</h3><br>
            <p>La cultura maya se refiere a una civilización mesoamericana que destacó a lo largo de más de dos
              milenios en numerosos aspectos socioculturales como su escritura jeroglífica, uno de los pocos
              sistemas de escritura plenamente desarrollados del continente americano precolombino, su arte, la
              arquitectura, su mitología y sus notables sistemas de numeración, así como en astronomía y
              matemáticas. Se desarrolló en el sureste de México (en los estados de Yucatán, Campeche,
              Quintana Roo, Chiapas y Tabasco), prácticamente toda Guatemala y también en Belice, la parte
              occidental de Honduras y en El Salvador, abarcando más de 300,000 km. Esta aplicación permite
              difundir algunos de los conocimientos de la cultura Maya, como por ejemplo: los diferentes calendarios
              Mayas, el conteo del tiempo, los Nahuales y energías. </p>
            <p>Este proyecto tiene como fin despertar el
              interés acerca de la cultura maya y las herramientas que nos brindan nos ayudan a tener una mejor
              interacción con el usuario, así como puede llegar hacer un canal de comunicación y construcción del
              conocimiento con otros interesados. </p>
            <img alt="" src="./img/logonew3.png" width="185" height="160">
            <a href="https://srlabs.a2hosted.com/rs-humhub/index.php?r=wiki%2Fpage%2Fview&title=Proyecto+Tiempo+Maya&cguid=03ab5d70-702f-4844-a654-5f47fd6a1f61">
              <img alt="" src="./img/srlabs.png" width="400" height="160">
            </a>
            <img alt="" src="./img/logonew3.png" width="185" height="160">
          </div>
        </div>
      </div>
    </section>
  </div>


  <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>