<?php
$cod=$_GET['cod'];
require("../include/conecta.inc");
conecta_bd() or die ("Não é possível conectar-se ao servidor.");
mysql_query("delete from tbgastos where idgasto='$cod'") or die
("Não é possível deletar evento!");
print("Gasto deletado com sucesso (código): $cod");
?>
<p><a href="../gastos/listar_gastos.php">Voltar</a>