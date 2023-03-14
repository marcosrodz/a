<?php 

if (!isset($_SESSION["usuario_logado"]))
{  
    header("http://localhost/aulas_senai/TDS08/exercicios_sql_segunda_lista/");
}