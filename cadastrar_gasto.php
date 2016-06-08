<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF8">
</head>
  
  
<?php
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
  
date_default_timezone_set('America/Araguaina'); 
require("include/conecta.inc");
if(isset($_GET['gasto'])){
	$gasto=$_GET['gasto'];
	$valor=$_GET['valor'];
	$idevento=$_GET['ddleventos'];
	if ($gasto=="" or $gasto=="")
	print("Faltou preencher algum campo...");
	else
	{
	conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	print("Inserindo o gasto:<p>");
	mysql_query("insert into tbgastos (descricao, valor, idevento) values ('$gasto', '$valor', $idevento);") or die("insert into tbgastos (descricao, valor, idevento) values ('$gasto', '$valor', $idevento);");
	print("gasto <b>$gasto</b> inserido com sucesso!");
	}
}
?>
<!-- Form Code Start -->
<fieldset style="width:500px" >
<div >
<form id='cadastrar' action='cadastrar_gasto.php' method='get' accept-charset='UTF-8'>
<legend>Cadastrar Gasto</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<div class='container'>
    <label for='gasto' >Gasto*: </label><br/>
    <input type='text' name='gasto' id='gasto' value='' maxlength="50" required /><br/>
</div>
<div class='container'>
<label for='ddleventos' >Evento*: </label><br/>
<?php
	$Codigo="";
	$descricao="";
	
	conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	$resultado=mysql_query("Select * from tbeventos");

print("<select name='ddleventos' id='ddleventos'>"); 
print("<option value='0'>:: SELECIONE ::</option>");
	while ($linha=mysql_fetch_array($resultado)) 
	{
	 $Codigo=$linha["idevento"];
	 $descricao=$linha["descricao"];
	 print("<option value='$Codigo'>{$linha['descricao']}</option>");
	}
print("</select>"); 
?>
</select>
</div>
<div class='container'>
    <label for='valor'>Valor*:</label><br/>
    <input name="valor" type="text" id="valor" onblur="javascript:somente_dinheiro(this);" onkeyup="javascript:somente_numero_virgula(this);" value='' size="12" required/>
</div>
<div class='container'>
    </br>
    <input type='submit' name='Submit' value='Gravar' />
</div>
    </br>
	<iframe src="gastos/listar_gastos.php" width="100%; height:100%" ></iframe>
</form>
</div>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

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