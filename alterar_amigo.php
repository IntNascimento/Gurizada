<?php
  //Ativa o Buffer que armazena o conteúdo principal da página
ob_start();

$cod=$_GET['cod'];
require("include/conecta.inc");
conecta_bd() or die ("Não é possível conectar-se ao servidor.");
$result=mysql_query("select * from amigos where Codigo='$cod'") or
die ("Não é possível retornar dados do amigo!");
$linha=mysql_fetch_array($result);
$Codigo=$linha["Codigo"];
$Nome=$linha["Nome"];
$EMail=$linha["EMail"];
$Telefone=$linha["Telefone"];
$Aniversario=$linha["Aniversario"];
print("<h3>Alterando os dados do amigo:</h3><p>");
?>

<form action="confirma_alterar.php" method="get">
  Código: <?php print($Codigo)?>
  <input type="hidden" name="cod_alter" value="<?php print($Codigo)?>">
  <br>Nome: <input type="text" name="nome_alter" value="<?php
  print($Nome)?>">
  <br>E-Mail: <input type="text" name="mail_alter" value="<?php
  print($EMail)?>">
  <br>Telefone: <input type="text" name="fone_alter" value="<?php
  print($Telefone)?>">
  <br>Aniversário: <input type="text" name="aniver_alter" value="<?php
  print($Aniversario)?>">
  <p><input type="submit" value="Alterar Dados">
  </form>
  <p><a href="mostrar.php">Cancelar e voltar</a>


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