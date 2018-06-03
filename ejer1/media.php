<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Media</title>
</head>
<body>
	<h1>Media de una serie de numeros</h1>
	<form action="" method="post">
		<label for="numero">Numero de elementos:</label>
		<input type="text" name="numero" id="numero" value="<?php if(isset($_POST['numero'])) echo $_POST['numero']; ?>" >
		<input type="submit" value="Aceptar" name="aceptar">
	
	<br>
	<br>
	<?php
	if (isset($_POST['numero'])) {
		$numero = $_POST['numero'];
		if (!empty($numero && is_numeric($numero) && $numero <= 10)) {
			print("<form action='' method='post'>");
			for ($i=1; $i < $numero+1; $i++) { 
				print("<label for='$i'>$i: </label> ");
				print(" <input type='text' name='$i' id='num$i'><br>");
			}
			print("<input type='submit' value='enviar' name='enviar'>");
			print("</form>");
			if (isset($_POST['enviar'])) {

				print("Los datos son: <br>");
				$suma =0;
				$total =0;
				for ($y=1; $y < $numero+1 ; $y++) {
					if (empty($_POST[$y])) {
						$_POST[$y] = null;
						$total --;
					}
					print("$y: $_POST[$y] <br>");
					$suma +=$_POST[$y];
					$total ++;

				}
				$media = $suma/$total;
				print("<h3>La media de los datos es: $media </h3><br>");
				print("<a href = 'media.php'>Volver a intentarlo </a>");
			}
		}else{
			print("No ha introducido un numero o es superior a 10");
		}
	}
	?>
</body>
</html>