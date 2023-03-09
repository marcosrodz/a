<?php 
    require_once("../includes.php");
?>
<body ng-app="myApp">    

<div ng-controller="produto">
            
    <form action="cadastro_produto.php" method="GET">            
        <div class="mb-3">
            <label class="form-label">Nome do Produto</label>
            <input type="text" name="produto" class="form-control" placeholder="Prencha o nome ...">
        </div>
        <div class="mb-3">
            <label class="form-label">Descricao do Produto</label>
            <input type="text" name="descricao" class="form-control" placeholder="Prencha a descrição ...">
        </div>
        <div class="mb-3">
            <label class="form-label">Valor do Produto</label>
            <input type="float" name="valor" class="form-control" placeholder="Prencha o valor ...">
        </div>
        <div class="mb-3">
            <input type="submit" name="enviar" class="form-control">
        </div>
    </form>
</div> 
</body>    

        