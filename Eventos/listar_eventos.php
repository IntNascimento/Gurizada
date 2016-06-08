<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
</head>
  
  
<?php
 $Mensagem="";
 $Codigo="";
 $Nome="";
 $Aniversario="";

require("../include/conecta.inc");
conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$resultado=mysql_query("Select * from tbeventos");
print("<center><table border='1' bordercolor='gray' width='100%' heigth='100%'>");
print("<tr><td><b>ID</td>");
print("<td><b>Nome</td>");
print("<td><b>Data do evento</td>");
print("<td><b>Deletar</td><td><b>Alterar</td></tr>");
 
while ($linha=mysql_fetch_array($resultado)) {
 $Codigo=$linha["idevento"];
 $Nome=$linha["descricao"];
 $Aniversario=$linha["data"];
 $dia=substr($Aniversario,8);
 $mes=substr($Aniversario,5,-3);
 $ano=substr($Aniversario,0,-6);
 $Mensagem="Tem certeza que deseja deletar este evento: $Nome?";
 
print("<tr><td align='center'><a href='detalhe_amigos.php?cod=$Codigo'>$Codigo</a></td>");
print("<td>$Nome</td>");
print("<td>$dia/$mes/$ano </td><td>");
print("<a href='deletar_evento.php?cod=$Codigo' onclick=\"return confirm('$Mensagem')\">Delete</a>"); 
print("</td><td><a href='alterar_evento.php?cod=$Codigo'>Alterar</a></td></tr>");
}
print("</table></center>");
?>

