<?php

function calcularedad($fecha) {
        $dia=date('d'); 
        $mes=date('m');
        $año=date('Y');
        $dias=(strtotime($mes.'/'.$dia.'/'.$año)-strtotime($fecha))/86400;
        //resta la fecha actual de la fecha que le pasais la pasa a dias
        $resultado=floor(($dias)/365.4); //calcula los años exactos
        return $resultado;
}

$uri="http://localhost/fp/examen/ejer3/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("calcularedad");
$server->handle();


?>