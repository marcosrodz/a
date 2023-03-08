<?php 
$url_absoluta = "http://localhost:8080/exercicios_sql_segunda_lista/";

$url = $_SERVER['REQUEST_URI'];

$posicao_array = 3;

$explode_url = explode("/", $url);

if ($explode_url[$posicao_array] != "cliente")
{    
    $url_cliente = $url_absoluta."cliente/";
}
else 
{   
    $url_cliente = "";    
}

if ($explode_url[$posicao_array] != "produto")
{    
    $url_produto = $url_absoluta."produto/";
}
else 
{   
    $url_produto = "";    
}

if ($explode_url[$posicao_array] != "estoque")
{    
    $url_estoque = $url_absoluta."estoque/";
}
else 
{   
    $url_estoque = "";    
}


if ($explode_url[$posicao_array] != "pedido")
{    
    $url_pedido = $url_absoluta."pedido/";
}
else 
{   
    $url_pedido = "";    
}
    
?>
<ul class="nav justify-content-center input-group-text">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="<?php echo $url_absoluta."home/home.php"; ?>">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $url_cliente."form_cliente.php"; ?>">Cadastrar Cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo $url_cliente."lista_cliente.php"; ?>">Listar Cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="<?php echo $url_produto."form_produto.php"; ?>">Cadastrar Produto</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="<?php echo $url_produto."lista_produto.php"; ?>">Listar Produto</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="<?php echo $url_pedido."form_pedido.php"; ?>">Cadastrar Pedido</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="<?php echo $url_pedido."lista_pedido.php"; ?>">Listar Pedido</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="<?php echo $url_estoque."form_estoque.php"; ?>">Cadastrar Estoque</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="<?php echo $url_estoque."lista_estoque.php"; ?>">Listar Estoque</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="logout.php">Sair</a>
    </li>
  </ul>
