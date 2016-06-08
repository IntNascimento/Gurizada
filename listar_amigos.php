<?php
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();

 $Codigo="";
 $Nome="";
 $EMail="";
 $Telefone="";
 $Aniversario="";

require("include/conecta.inc");
conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$resultado=mysql_query("Select * from amigos");
print("<center><h2>Mostrando os amigos.</h2>");
print("<table border='1' bordercolor='gray'>");
print("<tr><td><b>ID</td>");
print("<td><b>Nome</td>");
print("<td><b>E-Mail</td>");
print("<td><b>Telefone</td>");
print("<td><b>Data de Nascimento</td>");
print("<td><b>Deletar</td><td><b>Alterar</td></tr>");
 
while ($linha=mysql_fetch_array($resultado)) {
 $Codigo=$linha["codigo"];
 $Nome=$linha["nome"];
 $EMail=$linha["email"];
 $Telefone=$linha["telefone"];
 $Aniversario=$linha["data_nascimento"];
 $dia=substr($Aniversario,8);
 $mes=substr($Aniversario,5,-3);
 $ano=substr($Aniversario,0,-6);

print("<tr><td align='center'><a href='detalhe_amigos.php?cod=$Codigo'>$Codigo</a></td>");
print("<td>$Nome</td>");
print("<td>$EMail</td>");
print("<td>$Telefone</td>");
print("<td>$dia/$mes/$ano </td>");
print("<td><a href='deletar.php?cod=$Codigo'>Deletar</a></td>");
print("<td><a href='alterar_amigo.php?cod=$Codigo'>Alterar</a></td></tr>");
}
print("</table></center>");

 
?>

<div class='container'>
    <button name='btnNovo' Text="Novo" value='Novo' onclick="window.location.href='novo_amigo.php'">Novo</button>
</div>

<?php
  // pagemaincontent recebe o conteudo do buffer
  $pagemaincontent = ob_get_contents(); 

  // Descarta o conteudo do Buffer
  ob_end_clean(); 

  /* Atribuição das Variáveis da página principal
  * Lembrando que podem ser colocadas novas variáveis,
  * conforme necessidade */
  $pagetitle = "Titulo desta página"; 

  //Include com o Template
  include("master.php");
?>