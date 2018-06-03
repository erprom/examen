<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (!(isset($_POST['valores'])))
            $valor="";
        else $valor=$_POST['valores'];
        
        echo"<FORM ACTION='vector.php' METHOD='POST'/>";
        echo"Número de elementos: ";
        echo"<INPUT TYPE='TEXT' NAME='valores' VALUE=$valor>";
        echo"<INPUT TYPE='SUBMIT' NAME='aceptar' VALUE='Aceptar'>";
        echo"</form>";
        echo"<br/><br/>";
        if (isset($_POST['aceptar']))
        {           
            if (is_numeric($_POST['valores']))
            {
                $valor=$_POST['valores'];
                if ($valor>=1 && $valor<=10)
                {
                    echo "<FORM ACTION='vector.php' METHOD='POST'>";
                    for($i=1;$i<=$valor;$i++)
                    {
                       echo "$i: <INPUT TYPE='TEXT' NAME='vec[]'>"; 
                       echo "<br>";
                    }
                    echo "<br/>";
                    echo "<INPUT TYPE='hidden' NAME='valores' VALUE=$valor>";
                    echo "<INPUT TYPE='SUBMIT' NAME='calcular' VALUE='Enviar'>";
                    echo "</form>";      
                }
                else $error="Datos entre 1 y 10";
            }
            else $error="Datos no numéricos";
        }
         if (isset($error))
            {
              print "<p style='color:red'>$error</p>";
            }
        if (isset($_POST['calcular']))
         {
             $vec=$_POST['vec'];
             $suma=0;
             print "Los datos son:";
             print "<br/>";
             $i=1;
             $j=0;
             foreach($vec as $v ) 
             {
                 print "$i: <span style='color:red'>$v </span>";
                 $i++;
                 print"<br/>";
                 if (!empty($v))
                    $j++;
                    $suma=$suma+$v;
             }
             //$media=number_format($suma/$j, 2, ",", ".");
             if ($j!=0) 
             {
                 $media=$suma/$j;
                 printf("<H3>La media de los datos es: %.2f</H3>",$media);
             }
             else
                 printf("<H3>La media de los datos es: 0,00</H3>");
             echo "<a href='vector.php'>Intentarlo de nuevo</a>";
         }
        ?>
        
    </body>
</html>
