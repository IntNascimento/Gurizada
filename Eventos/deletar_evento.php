<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <title>Eventos</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  </head>
<?php
$cod=$_GET['cod'];
require("../include/conecta.inc");
conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$result = mysql_query("delete from tbeventos where idevento='$cod'");

if (!$result) {
    print("Não foi possível deletar o evento! Detalhes:" . mysql_error());
}
else
{
    print("Evento deletado com sucesso (código): $cod");    
}
?>
<p><a href="../eventos/listar_eventos.php">Voltar</a>
