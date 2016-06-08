<?php
 $Codigo="";
 $Nome="";
 $Aniversario="";

require("../include/conecta.inc");
conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$resultado=mysql_query("SELECT tbgastos.idgasto, tbgastos.descricao, tbgastos.valor, tbeventos.descricao evento FROM tbgastos INNER JOIN TBEVENTOS ON tbgastos.idevento = tbeventos.idevento;");
print("<center><table border='1' bordercolor='gray' width='100%' heigth='100%'>");
print("<tr><td><b>ID</td>");
print("<td><b>Gasto</td>");
print("<td><b>Valor</td>");
print("<td><b>Evento</td>");
print("<td><b>Deletar</td>");
print("<td><b>Alterar</td></tr>");
 
while ($linha=mysql_fetch_array($resultado)) {
 $Codigo=$linha["idgasto"];
 $Nome=$linha["descricao"];
 $valor=$linha["valor"];
 $evento=$linha["evento"];
 $Mensagem="Tem certeza que deseja deletar este gasto: $Nome?";
 
print("<tr><td align='center'><a href='detalhe_gasto.php?cod=$Codigo'>$Codigo</a></td>");
print("<td>$Nome</td>");
print("<td>R$ $valor</td>");
print("<td>$evento</td><td>");
print("<a href='deletar_gasto.php?cod=$Codigo' onclick=\"return confirm('$Mensagem')\">Delete</a>");
print("</td><td><a href='alterar_gasto.php?cod=$Codigo'>Alterar</a></td></tr>");
}
print("</table></center>");
?>

