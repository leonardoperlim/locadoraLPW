<?php
include('menu.php');
require_once("../model/Conexao.php");
require_once('../controller/ControllerCliente.php');
require_once("../model/Cliente.php");
ProcessoCliente('consultar'); // ----- PASSA O PROCESSO AO CONTROLE -----
?>

<!doctype html>
<html lang="en">

<body>
<div class="container col-auto">

    <div id="tabela" class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">CPF</th>
                <th scope="col">Sexo</th>
                <th scope="col">Email</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while($linha = mysqli_fetch_assoc($rs)) {
                ?>

                <tr>
                    <td><?php echo $linha["id_clientes"]?></td>
                    <td><?php echo utf8_encode($linha["nome"])?></td>
                    <td><?php echo $linha["telefone"]?></td>
                    <td><?php echo $linha["cpf"];?></td>
                    <td><?php echo $linha["sexo"];?></td>
                    <td><?php echo $linha["email"];?></td>
                    <td>
                        <div class="col">
                            <input type="hidden" name="ok" id="ok" />
                            <a href="editarCliente.php?id=<?php echo $linha["id_clientes"] ?>" onclick="return confirm('Deseja realmente editar este Cliente?')">
                                <button type="button" id="btnAzul" class="btn col-5 "<?php echo habilitarBotaoCliente($linha["disponivel"])?>>Editar</button>
                            </a>
                            <a href="clientes.php?excluir=<?php echo $linha["id_clientes"] ?>" onclick="return confirm('Deseja realmente excluir este Cliente?')">
                                <button type="button" class="btn btn-danger col-5" <?php echo habilitarBotaoCliente($linha["disponivel"])?>>Deletar</button>
                            </a>
                        </div>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <div align="center">
        <a href="incluirCliente.php"><button type="button" class="btn btn-success">Adicionar Cliente</button></a>
    </div>
</div>
</body>
</html>