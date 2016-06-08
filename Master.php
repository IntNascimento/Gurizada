<!DOCTYPE html>
<html lang="pt-br" >
<head>
  <title>Amigos</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
  <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
  <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
  <script src="scripts/pwdwidget.js" type="text/javascript"></script>  

  <script language="javascript"> 
    function somente_numero_virgula(campo){  
      var digits=".0123456789"  
      var campo_temp   
      for (var i=0;i<campo.value.length;i++){  
        campo_temp=campo.value.substring(i,i+1)   
        if (digits.indexOf(campo_temp)==-1){  
          campo.value = campo.value.substring(0,i);  
        }  
      }  
    } 
	
	function somente_dinheiro(campo) {
	var n = campo.value
    campo.value = "" + parseFloat(n).toFixed(2).replace(/./g, function(c, i, a) { return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c; });
}
  </script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
	 <?php 
	 
	require_once("./include/membersite_config.php");

   if($fgmembersite->CheckLogin())
   {
	   $UsuarioLogado = "";
    //echo $fgmembersite->UserFullName();
   }
   else{
	   $UsuarioLogado = "style='display:none;'";
	  // echo"nao logado";
   }
   
 ?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" >
	  //<?= $UsuarioLogado; ?>
        <li class="active"><a href="index.php#">Home</a></li>
        <li><a href="listar_amigos.php#">Friends</a></li>
		<li><a href="cadastrar_evento.php">Eventos</a></li>
		<li><a href="cadastrar_gasto.php">Gastos</a></li>
		<li><a href="contato.php">Contato</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="register.php#">Registro</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-8 text-left">
 
      <?php
	        echo $pagemaincontent;
		?>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>Noticia 1</p>
      </div>
      <div class="well">
        <p>Noticia 2</p>
      </div>
	  <div class="well">
        <p>Noticia 3</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Developed by IntNascimento</p>
</footer>

</body>
</html>
