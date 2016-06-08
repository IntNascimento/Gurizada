<?php
  //Ativa o Buffer que armazena o conteúdo principal da página
  ob_start();
?>
 <h3><em>Gerenciador de Eventos da Gurizada</em></h3>
 
 <br /><br />
 Duis autem vel eum iriure dolor in hendrerit in
 vulputate velit molestie consequat, vel illum
 dolore eu feugiat nulla facilisis ats eros et
 accumsan et iusto odio dignissim qui blandit
 prasent up zzril delenit augue duis dolore te
 feugait nulla facilisi. Lorem euismod tincidunt
 erat volutpat.  
 
 <h3><em>Sobre o Gerenciador</em></h3>
 Lorem ipsum dolor sit amet, consectetuer adipiscing
 elit, sed nonummy nibh euismod tincidunt ut laoreet
 dolore magna aliat volutpat. Ut wisi enim ad minim
 veniam, quis nostrud exercita ullamcorper
 suscipit lobortis nisl ut aliquip ex consequat.
 <br /><br />
 Duis autem vel eum iriure dolor in hendrerit in
 vulputate velit molestie consequat, vel illum
 dolore eu feugiat nulla facilisis ats eros et
 accumsan et iusto odio dignissim qui blandit
 prasent up zzril delenit augue duis dolore te
 feugait nulla facilisi. Lorem euismod tincidunt
 erat volutpat. 
 

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