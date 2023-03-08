<?php 
    require_once("../includes.php");
?>
<body ng-app="myApp">    

    <div ng-controller="telefone">
                
        <form action="cadastro_email.php" method="GET">            
            
            <input name="idcliente" type="hidden" value="<?php 
                if (isset($_GET['idcliente']))
                {
                    echo $_GET['idcliente'];
                }
            ?>">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Prencha o email">
            </div>

            <div class="mb-3">
                
                <input type="submit" name="enviar" class="form-control">
            </div>
        </form>
    </div> 
</body>    

            