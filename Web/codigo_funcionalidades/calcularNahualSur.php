<?php

$formato = mktime(0, 0, 0, 1, 1, 1720) / (24 * 60 * 60);
$fecha = date("U", strtotime($fecha_consultar)) / (24 * 60 * 60);

$id = $fecha - $formato;

$nahual = $id % 20;
if ($nahual < 0) {
	$nahual += 19;
}

$nahualSur = $nahual - 12;
if ($nahualSur < 0) { 
    $nahualSur += 20;
}

$Query_nahualSur = $conn->query("SELECT nombre, significado, imagen  FROM nahual WHERE idweb=".$nahualSur." ;");
$row = mysqli_fetch_assoc($Query_nahualSur);
$row['imagen'] = substr($row['imagen'], 1);
return $row;

?>