<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <title>Eventos</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  </head>
  
<?php
require ("../include/conecta.inc");

if (isset($_GET["alterar"]))
{
    $cod=$_GET['cod'];
    $descricao=$_GET['descricao'];
    conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    print("Alteração do evento realizada:<p>");
    print("Código: $cod <b>$descricao</b><p>");
    mysql_query(" update tbeventos set descricao='$descricao' where idevento='$cod' ")
    or die ("Não é possível alterar dados do evento!");
    print("Dados do evento alterados com sucesso!");
}
else
{
    $cod = $_GET['cod'];
    conecta_bd() or die("Não é possível conectar-se ao servidor.");
    $result = mysql_query("select * from tbeventos where idevento='$cod'") or die("Não é possível retornar dados do evento!");
    $linha = mysql_fetch_array($result);
    $Codigo = $linha["idevento"];
    $Nome = $linha["descricao"];
    print ("<h3>Alterando os dados do :</h3><p>");
?>
    <form action="alterar_evento.php" method="get" style="height: 100%;">
    Código:      <?php print ($Codigo) ?><input type="hidden" name="cod" value="<?php print ($Codigo) ?>"/><br>
    Descrição:   <input type="text" name="descricao" maxlength="250" required="true"   value="<?php print ($Nome) ?>"/><br>
    <p><input type="submit" name="alterar" value="Alterar Dados"/><a href="listar_eventos.php">Cancelar e Voltar</a>
    </form>
<?php
}
?>
<br /><a href="listar_eventos.php">Voltar</a>