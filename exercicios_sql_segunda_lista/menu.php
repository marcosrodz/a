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
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled">Disabled</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
  </ul>

<nav class="navbar navbar-expand-lg bg-body-tertiary input-group-text">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="<?php echo $url_absoluta."home/home.php"; ?>"><h5>Inicio &nbsp&nbsp</h5></a></li>
                <li class="nav-item">
                    <a href="<?php echo $url_cliente."form_cliente.php"; ?>"><h5>Cadastrar Cliente &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url_cliente."lista_cliente.php"; ?>"><h5>Listar Cliente &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url_produto."form_produto.php"; ?>"><h5>Cadastrar Produto &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url_produto."lista_produto.php"; ?>"><h5>Listar Produto &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url_pedido."form_pedido.php"; ?>"><h5>Cadastrar Pedido &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url_pedido."lista_pedido.php"; ?>"><h5>Listar Pedido &nbsp&nbsp</h5></a></li>
                <li class="nav-item">
                    <a href="<?php echo $url_estoque."form_estoque.php"; ?>"><h5>Cadastrar Estoque &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $url_estoque."lista_estoque.php"; ?>"><h5>Listar Estoque &nbsp&nbsp</h5></a>
                </li>
                <li class="nav-item"><a href="logout.php"><h5>Sair &nbsp</h5></a></li>
            </ul>
        </div>
    </div>
</nav>
