<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>vivienda</title>
	<style>
	input{
		padding: 2px;
		margin: 5px;
	}
	select{
		padding: 2px;
		margin: 5px;
	}
</style>
</head>
<body>
	<h1>insercion de vivienda</h1>
	<?php
	if (!isset($_POST['insertar'])) {
		
		?>
		<p>Introduzca los datos de la vivienda:</p>
		<form action="" method="post">
			<label for="tipo">Tipo de vivienda:</label>
			<select name="tipo" id="tipo">
				<option value="piso" checked>piso</option>
				<option value="adosado">adosado</option>
				<option value="chalet">chalet</option>
				<option value="casa">casa</option>
			</select><br>
			<label for="Zona">Zona</label>
			<select name="zona" id="zona">
				<option value="centro" checked>centro</option>
				<option value="afueras">A las afueras</option>
			</select><br>
			<label for="direccion">direccion</label>
			<input type="text" name="direccion" id="direccion"><br>
			<label for="dormitorio">Numero de dormitorios:</label>
			<input type="radio" name="dormitorio" id="dormitorio" value="1">1
			<input type="radio" name="dormitorio" id="dormitorio" value="2">2
			<input type="radio" name="dormitorio" id="dormitorio" value="3" checked>3
			<input type="radio" name="dormitorio" id="dormitorio" value="4">4
			<input type="radio" name="dormitorio" id="dormitorio" value="5">5 <br>	
			<label for="precio">Precio:</label>
			<input type="text" name="precio" id="precio"> euros <br>
			<label for="tam">Tamaño:</label>
			<input type="text" name="tam" id="tam"> <br><br>
			<input type="submit" value="Insertar Vivienda" name="insertar" id="insertar">
		</form>
		<?php
	}else{
		$tipo = $_POST['tipo'];
		$zona = $_POST['zona'];
		$direccion = $_POST['direccion'];
		$dormitorio = $_POST['dormitorio'];
		$precio = $_POST['precio'];
		$tam = $_POST['tam'];
		$error = array();
		$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = "mysql:host=localhost;dbname=vivienda";
    $usuario = 'dwes';
    $contrasena = 'abc123.';
    $bd = new PDO($dsn, $usuario, $contrasena, $opc);
		if (empty($direccion) || empty($precio) || empty($tam) || !is_numeric($precio) || !is_numeric($tam)) {
			print("No se ha podido realizar la insercion devido a los siguientes errores: ");
			if (empty($direccion)) {
				$error []= "se requiere direccion";
			}
			if (empty($precio)) {
				$error []= "se requiere precio";
			}
			if (empty($tam)) {
				$error []= "se requiere tamaño";
			}
			if (!is_numeric($precio)) {
				$error []= " el precio debe de ser numerico ";
			}
			if (!is_numeric($tam)) {
				$error []= " el tamaño debe de ser numerico ";
			}
			print("<ul>");
			foreach ($error as $key => $value) {
				
					print("<li>$value</li>");
			}
			print("</ul>");
			print("<a href='vivienda.php'>[ Volver ]</a>");
		}else{
			$sql = "INSERT INTO datosvivienda VALUES('".$tipo."','".$zona."','".$direccion."','".$dormitorio."','".$precio."','".$tam."')";
			$resultado = $bd ->query($sql);
			if ($resultado) {
				print("Estos son los datos introducidos: <br>");
				print("<ul>");
				print("<li>Tipo : $tipo</li>");
				print("<li>zona : $zona</li>");
				print("<li>direccion : $direccion</li>");
				print("<li>Numero de dormitorios : $dormitorio</li>");
				print("<li>precio : $precio euros</li>");
				print("<li>tamaño : $tam metros cuadrados</li>");
				print("<a href='vivienda.php'>[ Insertar otra vivienda ]</a>");
			}
		}

	}
	?>
</body>
</html>