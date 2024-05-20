<?php
date_default_timezone_set('US/Central'); // Ajusta esto a tu zona horaria
$hour = date('H');
$minute = date('i');

if ($hour >= 6 && $hour < 12) {
    $timeOfDay = 'dia';
} elseif ($hour >= 12 && $hour < 18) {
    $timeOfDay = 'tarde';
} elseif ($hour >= 18 && $hour < 24) {
    $timeOfDay = 'noche';
} else {
    $timeOfDay = 'alba';
}
?>