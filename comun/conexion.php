<?php
  $con = pg_connect("host=localhost dbname=datos " .
                    "user=usuario password=usuario") or
         die("Ha ocurrido un error al establecer la conexión " .
             "con el servidor");
?>

