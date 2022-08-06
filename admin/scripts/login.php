<?php
require('../class/allClass.php');
error_reporting(0);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
$contra  = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

use nsnewsesion\newsesion;
use nsfunciones\funciones;

$fn = new funciones();
$get = new newsesion();

$logeo = $get->login($usuario, $contra);
// $clogeo = $fn->cuentarray($logeo);
$inicio = $logeo['id'][0];

if($inicio > 0){
    $id             = $logeo['id'][0];
    $id_empresa     = $logeo['id_empresa'][0];
    $empresa        = $logeo['empresa'][0];
    $nombre         = $logeo['nombre'][0];
    $nivel          = $logeo['nivel'][0];
    $color          = $logeo['aspecto'][0];
    $nueva_sesion   = $get->crearsesion($id, $id_empresa, $empresa, $nombre, $nivel, $color);
    echo "1";
}else{
    echo "0";
	exit();	
}
?>