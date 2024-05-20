<?php

$formato = mktime(0, 0, 0, 1, 1, 1720) / (24 * 60 * 60);
$fecha = date("U", strtotime($fecha_consultar)) / (24 * 60 * 60);

$id = $fecha - $formato;

$nahual = $id % 20;
if ($nahual < 0) {
	$nahual += 19;
}

$nahualNorte = $nahual + 12;
if ($nahualNorte >= 20) { 
    $nahualNorte -= 20;
}

$Query_nahualNorte = $conn->query("SELECT nombre, significado, imagen  FROM nahual WHERE idweb=".$nahualNorte." ;");
$row = mysqli_fetch_assoc($Query_nahualNorte);
$row['imagen'] = substr($row['imagen'], 1);
return $row;

?>