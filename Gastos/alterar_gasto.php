<?php
$cod = $_GET['cod'];
require ("../include/conecta.inc");
if (isset($_GET["alterar"]))
{
    $descricao=$_GET['descricao'];
    $valor=$_GET['valor'];
    conecta_bd() or die ("Não é possível conectar-se ao servidor.");
    print("Alteração do evento realizada:<p>");
    print("Código: $cod <b>$descricao</b><p>");
    mysql_query(" update tbgastos set descricao='$descricao', valor='$valor' where idgasto='$cod' ")
    or die ("Não é possível alterar dados do gasto!");
    print("Dados do evento alterados com sucesso!");
    print("<a href='listar_gastos.php'>Voltar</a>");
}
else
{
    conecta_bd() or die("Não é possível conectar-se ao servidor.");
    $result = mysql_query("select tbgastos.idgasto,tbgastos.descricao, tbeventos.descricao as evento, tbgastos.valor from tbgastos inner join tbeventos on tbgastos.idevento = tbeventos.idevento where idgasto='$cod'") or
        die("Não é possível retornar dados do amigo!");
    $linha = mysql_fetch_array($result);
    $codigo = $linha["idgasto"];
    $nome = $linha["descricao"];
    $valor = $linha["valor"];
    $evento = $linha["evento"];
?>

<form action="alterar_gasto.php" method="get">
<center>
<table border='1' bordercolor='gray' width='100%' heigth='100%'>
<tr>
    <td style="width: 20%; background-color: #dddddd; text-align: center;">
        Código:
    </td>
    <td style="background-color: #EEEEEE">
        <?php print ($codigo) ?>
        <input type="hidden" name="cod" value="<?php print ($codigo) ?>">
    </td>
</tr>
<tr>
    <td style="width: 20%; background-color: #dddddd; text-align: center;">
        Evento: 
    </td>
     <td style="background-color: #EEEEEE">
        <?php print ($evento) ?>
    </td>
</tr>
<tr>
    <td style="width: 20%; background-color: #dddddd; text-align: center;">
        Descrição:  
    </td>
     <td style="background-color: #EEEEEE">
        <input type="text" name="descricao" maxlength="250" required="true" style="width: 100% !important;" value="<?php print ($nome) ?>">
    </td>
</tr>
<tr>
    <td style="width: 20%; background-color: #dddddd; text-align: center;">
        Valor:   
    </td>
     <td style="background-color: #EEEEEE">
        <input type="text" name="valor" maxlength="10" required="true" value="<?php print ($valor) ?>">
    </td>
</tr>
<tr>
     <td style="background-color: #EEEEEE">
        <p><input type="submit" name="alterar" value="Alterar Dados">
    </td>
    <td style="background-color: #EEEEEE">
        <a href="listar_gastos.php">Cancelar e voltar</a>
    </td>
</tr>
</table>
</center>
</form>
<?php
}
?>