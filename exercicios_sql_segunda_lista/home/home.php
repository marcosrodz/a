<?php 
require_once("../includes.php");
?>
<br><br><br>
<center>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h6 class="card-subtitle mb-2 text-muted">Olá</h6>
    <h5 class="card-title">Seja Bem Vindo</h5>
    <h3 p class="card-text"><?php echo $_SESSION["usuario_logado"].' !!';?></p>
  </div>
</div>