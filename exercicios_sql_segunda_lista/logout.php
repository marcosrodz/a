<?php 
require_once("verifica_sessao.php");

unset($_SESSION["usuario_logado"]);

header("Location: index.php");
