<?php
include('menu.php');
require_once("../model/Conexao.php");
require_once('../controller/ControllerCarro.php');
require_once("../model/Carro.php");
ProcessoCarro('consultar');
?>

<!doctype html>
<html lang="en">
<body>
<div class="container col-auto">

    <div id="tabela" class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Cor</th>
                <th scope="col">Placa</th>
                <th scope="col">Diária</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while($linha = mysqli_fetch_assoc($rs)) {
                ?>
                <tr>
                    <td><?php echo utf8_encode($linha["marca"])?></td>
                    <td><?php echo utf8_encode($linha["modelo"])?></td>
                    <td><?php echo $linha["ano"];?></td>
                    <td><?php echo utf8_encode($linha["cor"]);?></td>
                    <td><?php echo $linha["placa"];?></td>
                    <td>R$ <?php echo $linha["valor_diaria"];?>,00</td>
                    <td>
                        <div class="col">
                            <input type="hidden" name="ok" id="ok" />
                            <a href="editarCarro.php?id=<?php echo $linha["id_carro"] ?>" onclick="return confirm('Deseja realmente editar este Carro?')"><button type="button" id="btnAzul" class="btn     col-5"<?php echo habilitarBotao($linha["aluguel"])?>>Editar</button></a>
                            <a href="carros.php?excluir=<?php echo $linha["id_carro"] ?>" onclick="return confirm('Deseja realmente excluir este Carro?')"><button type="button" class="btn btn-danger col-5"<?php echo habilitarBotao($linha["aluguel"])?>>Deletar</button></a>
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
        <a href="incluirCarro.php"><button type="button" class="btn btn-success">Adicionar Carro</button></a>
    </div>
</div>
</body>
</html>