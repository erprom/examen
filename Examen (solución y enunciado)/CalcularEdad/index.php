<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio calcular edad</title>
    </head>
    <body>
        
        <!--El formulario va sobre si mismo no llamamos a calcular php 
        ya que ese es el servicio -->
        <?php
        if (empty($_POST['fecha']))
        {
        ?>    
            <form name='formularioDatos' method='post' action='index.php'>
            <p>Cálcula la edad de una persona</p>
            Introduzca la fecha de nacimiento:<input type='date' name='fecha'>
            <br/><br/>
            <input value='Calcular' name='calcular' type='submit'/>
            </form>
        <?php
        }
            $url="http://localhost/calcularEdad/calcular.php";
            $uri="http://localhost/calcularEdad";
            //Fijate bien url es la dirección del archivo php que contiene las funciuones  
            //uri es la dirección del proyecto en el localhost es decir como has llamado al proyecto.
            $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
            if (isset($_POST['calcular']))
            {    
            //establecer parametros de envío
                if (!empty($_POST['fecha']))
                {   
                    //llamar a la función 
                    $fecha=$_POST['fecha'];
                    print "La edad del nacido/nacida el $fecha es: ". $cliente->calcularedad($fecha). " años"; 
                    echo "<P>[ <A HREF='index.php'>Volver</A> ]</P>";
                }
                else
                {
                    echo "El dato es obligatorio";
                }
            }
        ?>

    </body>
</html>
