<?php
   
   //En la parte del servidor solo se añaden las funciones
   //El resto del código va en la parte del cliente
    function calcularedad($fecha) {
        $dia=date('d'); 
        $mes=date('m');
        $año=date('Y');
        $dias=(strtotime($mes.'/'.$dia.'/'.$año)-strtotime($fecha))/86400;
        //resta la fecha actual de la fecha que le pasais la pasa a dias
        $resultado=floor(($dias)/365.4); //calcula los años exactos
    return $resultado;
}
//include_once 'lib/nusoap.php'; si tienes bien configurado el archivo php.ini
// quitando los ; en las lineas que te indique ayer no hace falta esta libreria.

//la dos variable del formulario
//$fecha="";//No hace falta recoger variables de ningun formulario
//en la llamada a la funcion ya se pasan como parámetros. 
//SERVIDOR SOAP
$uri = "http://localhost/calcularEdad"; //hay que incluir localhost
$server = new SoapServer(null, array('uri' => $uri));
$server->addFunction("calcularedad");
$server->handle();
?>

