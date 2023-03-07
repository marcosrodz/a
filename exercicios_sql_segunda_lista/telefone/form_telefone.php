<?php 

require_once("../includes.php");
/*$id = $_POST["idcliente"];
$sql = "INSERTE INTO `telefone` (`idcliente`,`numero_telefone`) VALUES ($id,)"*/

?>

<body ng-app="myApp">    

    <div ng-controller="telefone">
                
        <form action="cadastro_telefone.php" method="GET">            
            
            <input name="idcliente" type="hidden" value="<?php 
                if (isset($_GET['idcliente']))
                {
                    echo $_GET['idcliente'];
                }
            ?>">

            <div class="mb-3">
                <label class="form-label">Número</label>
                <input type="number" name="numero_telefone" class="form-control" placeholder="Prencha o Número">
            </div>

            <div class="mb-3">
                
                <input type="submit" name="enviar" class="form-control">
            </div>
        </form>
    </div> 
</body>    

            