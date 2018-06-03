<?php
$url="http://localhost/fp/examen/ejer3/calcularedad.php";
$uri="http://localhost/fp/examen/ejer3/";
$cliente = new SoapClient(null,array('location'=>$url,'uri'=>$uri));
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>calcular edad</title>
</head>
<body>
	<?php
	if (!isset($_POST['calcular'])) {
	?>
	<h1>Calcula la edad de una persona</h1>
	<form action="" method="post">
		<label for="edad">introduzca la fecha de nacimiento:</label>
		<input type="text" name="fecha" id="fecha"><br>
		<input type="submit" value="calcular" name="calcular" id="calcular">
	</form>
	<?php
}else{
	$fecha = $_POST['fecha'];
	if (empty($fecha)) {
		print("<h3>Introduce una fecha</h3>");
		print("<a href='cliente.php'>Volver</a>");
	}else{
		$edad = $cliente->calcularedad($fecha);
		print("la edad del nacido/nacida el $fecha es: $edad años<br>");
		print("<a href='cliente.php'>Volver</a>");
	}
}

	?>
</body>
</html>