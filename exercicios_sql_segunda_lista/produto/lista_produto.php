<?php 

require_once("../includes.php");
$conn = $_SESSION["conexao"];
$sql = "SELECT * FROM produto";
$consulta = mysqli_query($conn, $sql);
?>

<br><br>
<br><br>
            <!-- Pessoa Física -->
<div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
    <div class="p-3 mb-2 bg-secondary text-white" class="card mb-4 rounded-3 shadow-sm">
        <h4 class="p-3 mb-2 bg-dark text-white" class="my-0 fw-normal"><b>Produtos</b></h4>
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Preço (R$)</th>   
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($result = mysqli_fetch_assoc($consulta)) {
                                print'
                                    <tr>
                                        <td>'.$result["idproduto"].' </td>
                                        <td>'.$result["nome_produto"].' </td>
                                        <td>'.$result["descricao_produto"].' </td>
                                        <td>'.$result["preco"].' </td>
                                    </tr>';
                                }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>  