<?php
namespace nsventas;
use conexionbd\mysqlconsultas;

class ventas extends mysqlconsultas{
    public function prospectos(){
        $qry = "SELECT * FROM prospectos";
    }
}


?>