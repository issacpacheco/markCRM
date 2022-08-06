<?php
require('../class/allClass.php');

use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$empresa        = filter_input(INPUT_POST, 'empresa',           FILTER_SANITIZE_SPECIAL_CHARS);
$nombre         = filter_input(INPUT_POST, 'nombre',            FILTER_SANITIZE_SPECIAL_CHARS);
$paterno        = filter_input(INPUT_POST, 'paterno',           FILTER_SANITIZE_SPECIAL_CHARS);
$materno        = filter_input(INPUT_POST, 'materno',           FILTER_SANITIZE_SPECIAL_CHARS);
$fch_nac        = filter_input(INPUT_POST, 'fch_nacimiento',    FILTER_SANITIZE_SPECIAL_CHARS);
$telefono       = filter_input(INPUT_POST, 'telefono',          FILTER_SANITIZE_SPECIAL_CHARS);
$correo         = filter_input(INPUT_POST, 'correo',            FILTER_SANITIZE_SPECIAL_CHARS);
$password       = filter_input(INPUT_POST, 'password',          FILTER_SANITIZE_SPECIAL_CHARS);
$confpassword   = filter_input(INPUT_POST, 'confpassword',      FILTER_SANITIZE_SPECIAL_CHARS);

$alter1     =   "ALTER TABLE empresas AUTO_INCREMENT = 0";
$ejecucion  ->  ejecuta($alter1);
$qry1       =   "INSERT INTO empresas (id, nombre) VALUES (0,'$empresa')";
$id         =   $ejecucion  ->  ejecuta($qry1);

$alter2     =   "ALTER TABLE usuarios AUTO_INCREMENT = 0";
$ejecucion  ->  ejecuta($alter2);
$qry2       =   "INSERT INTO usuarios (id, nombre, paterno, materno, fch_nacimiento, telefono, correo, pass, id_empresa, nivel) 
                VALUES (0, '$nombre', '$paterno', '$materno', '$fch_nac', '$telefono', '$correo', '$confpassword', '$id', 1)";
$d          =   $ejecucion->ejecuta($qry2);

if(isset($d)){
    echo "1";
}else{
    echo "-1";
}

?>