<?php

date_default_timezone_set('America/Araguaina'); 
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
	$evento=$_GET['evento'];
	$data_evento=$_GET['data_evento'];
	if ($evento=="" or $evento=="")
	print("Faltou preencher algum campo...");
	else
	{
	require("conecta.inc");
	conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	print("Inserindo o amigo:<p>");
	mysql_query("insert into amigos (evento, data) values ('$evento', '$data_evento');") or die
	("Não foi possível inserir evento!");
	print("Evento inserido com sucesso: <b>$evento</b>");
	}
}
?>