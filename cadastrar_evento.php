<?php
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
  
date_default_timezone_set('America/Araguaina'); 
require("include/conecta.inc");
if(isset($_GET['evento'])){
	$evento=$_GET['evento'];
	$data_evento=$_GET['data_evento'];
	if ($evento=="" or $evento=="")
	print("Faltou preencher algum campo...");
	else
	{
	conecta_bd() or die ("Não é possível conectar-se ao servidor.");
	print("Inserindo o amigo:<p>");
	mysql_query("insert into tbeventos (descricao, data) values ('$evento', '$data_evento');") or die
	("Não foi possível inserir evento!");
	print("Evento <b>$evento</b> inserido com sucesso!");
	}
}
?>
<!-- Form Code Start -->
<fieldset style="width:500px" >
<div >
<form id='cadastrar' action='cadastrar_evento.php' method='get' accept-charset='UTF-8'>
<legend>Cadastrar Evento</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<div class='container'>
    <label for='evento' >Evento*: </label><br/>
    <input type='text' name='evento' id='evento' value='' maxlength="50" required /><br/>
</div>
<div class='container'>
    <label for='data_evento' >Data*:</label><br/>
    <input name="data_evento" type="date" id="data_evento" value="<?php echo date('Y-m-d'); ?>" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>"/>
</div>
<div class='container'>
</br>
    <input type='submit' name='Submit' value='Gravar' />
</div>
</br>
	<iframe src="eventos/listar_eventos.php" width='100%' heigth="100%" ></iframe>
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