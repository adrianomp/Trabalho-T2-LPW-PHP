<?php

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i:s');



$tempo= "2015-11-26 11:28:24";


$partes = explode(" ",$tempo);

$data = $partes[0];
$hora = $partes[1];

$hora_split = explode(':',$hora);

$hora_relogio = $hora_split[0];
echo $hora_relogio;

