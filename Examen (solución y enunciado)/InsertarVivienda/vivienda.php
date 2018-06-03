<HTML LANG="es">

<HEAD>
   <meta charset="UTF-8">
   <TITLE>Inserción de vivienda</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<?PHP
   if (isset($_REQUEST['insertar']))
   {

   // Obtener valores introducidos en el formulario
      $tipo = $_POST['tipo'];
      $zona = $_POST['zona'];
      $direccion = $_POST['direccion'];
      $ndormitorios = $_POST['ndormitorios'];
      $precio = $_POST['precio'];
      $tamano = $_POST['tamano'];
 
      print ("<H1>Inserción de vivienda</H1>\n");

   // Comprobar que se han introducido todos los datos obligatorios
      $errores = "";
      if (empty($direccion))
         $errores = $errores . "   <LI>Se requiere la dirección de la vivienda";
      if (!is_numeric($tamano))
         $errores = $errores . "   <LI>El tamaño debe ser un valor numérico";
      if (!is_numeric($precio))
         $errores = $errores . "   <LI>El precio debe ser un valor numérico";

   // Mostrar errores encontrados
      if ($errores != "")
      {
         print ("<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>");
         print ("<UL>");
         print ($errores);
         print ("</UL>");
         print ("<P>[ <A HREF='vivienda.php'>Volver</A> ]</P>\n");
      }
      else
      {

        
         $db=new mysqli;
         $db->connect('localhost', 'root', 'Jbll1969', 'vivienda');
         if ($db->connect_error==null)
         {
             $consulta=$db->query("insert into datosvivienda values('".$tipo."','".$zona."','".$direccion."',".$ndormitorios.",".$precio.",".$tamano.")");
             if ($consulta!=null)
             {
                print ("<P>Estos son los datos introducidos:</P>\n");
                print ("<UL>");
                print ("   <LI>Tipo: $tipo");
                print ("   <LI>Zona: $zona");
                print ("   <LI>Dirección: $direccion");
                print ("   <LI>Número de dormitorios: $ndormitorios");
                print ("   <LI>Precio: $precio euros");
                print ("   <LI>Tamaño: $tamano metros cuadrados");
                print ("</UL>");
                print ("<P>[ <A HREF='vivienda.php'>Insertar otra vivienda</A> ]</P>");    
             }
             $db->close();
         }
         
      }
   }
   else
   {
    ?>

    <H1>Inserción de vivienda</H1>

    <FORM ACTION="vivienda.php" METHOD="POST">
    <FIELDSET>
        <LEGEND><H2>Introduzca los datos de la vivienda:</H2></LEGEND>
    <P><LABEL>Tipo de vivienda:</LABEL>
    <SELECT NAME="tipo">
       <OPTION VALUE="Piso" SELECTED>Piso
       <OPTION VALUE="Adosado">Adosado
       <OPTION VALUE="Chalet">Chalet
       <OPTION VALUE="Casa">Casa
    </SELECT></P>

    <P><LABEL>Zona:</LABEL>
    <SELECT NAME="zona">
       <OPTION VALUE="Centro" SELECTED>Centro
       <OPTION VALUE="A las afueras">A las afueras
    </SELECT></P>

    <P><LABEL>Dirección:</LABEL>
    <INPUT TYPE="TEXT" NAME="direccion" maxlength="50" size="70"></P>

    <P><LABEL>Número de dormitorios:</LABEL>
    <INPUT TYPE="radio" NAME="ndormitorios" VALUE="1">1
    <INPUT TYPE="radio" NAME="ndormitorios" VALUE="2">2
    <INPUT TYPE="radio" NAME="ndormitorios" VALUE="3" CHECKED>3
    <INPUT TYPE="radio" NAME="ndormitorios" VALUE="4">4
    <INPUT TYPE="radio" NAME="ndormitorios" VALUE="5">5</P>

    <P><LABEL>Precio:</LABEL>
    <INPUT TYPE="TEXT" NAME="precio"> euros;</P>

    <P><LABEL>Tamaño:</LABEL>
    <INPUT TYPE="TEXT" NAME="tamano"> metros cuadrados</P>

    <P><INPUT TYPE="submit" NAME="insertar" VALUE="Insertar vivienda"></P>
    </FIELDSET>
    </FORM>

    <?PHP
    }
    ?>

</BODY>
</HTML>
