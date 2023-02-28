<?php 

require_once("../includes.php");

$conn = $_SESSION["conexao"];

$sql = "SELECT * FROM CLIENTE C 
JOIN PESSOA_FISICA PF
ON C.IDCLIENTE = PF.IDCLIENTE";

$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0)
{
    ?>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">ADD Telefone</th>
                <th scope="col">Add Email</th>
                <th scope="col">Endereço</th>    
            </tr>
        </thead>
        <tbody>
            <?php 
                while($result = mysqli_fetch_assoc($query))
                {
                    echo '
                        <tr>
                            <td>'.$result["idcliente"].' </td>
                            <td>'.$result["nome_cliente"].' </td>
                            <td>'.$result["cpf"].' </td>
                            <td>'.$result["rg"].' </td>
                            <td>'.$result["data_nascimento"].' </td>
                            <td>
                                <a href="../telefone/form_telefone.php?idcliente='.$result["idcliente"].'">
                                    <button class="btn btn-primary">
                                        Add Telefone
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="../email/form_email.php?idcliente='.$result["idcliente"].'">
                                    <button class="btn btn-success">
                                        Add Email
                                    </button>
                                </a>
                            </td>
                            <td>
                                <a href="../endereco/form_endereco.php?idcliente='.$result["idcliente"].'">
                                    <button class="btn btn-warning">
                                        Add endereço
                                    </button>
                                </a>
                            </td>
                        </tr>';  
                }

            ?>
            
        </tbody>
    </table>
    <?php 
}