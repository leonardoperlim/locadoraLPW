<?php
include('menu.php');
require_once("../model/Conexao.php");
require_once('../controller/ControllerCarro.php');
require_once('../controller/ControllerCliente.php');
require_once("../model/Carro.php");
ProcessoCarro('consultar');
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
                <th scope="col">Disponível</th>

            </tr>
            </thead>
            <tbody>
            <?php
                while($linha = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td><?php echo utf8_encode($linha["marca"]) ?></td>
                        <td><?php echo utf8_encode($linha["modelo"]) ?></td>
                        <td><?php echo $linha["ano"]; ?></td>
                        <td><?php echo utf8_encode($linha["cor"]); ?></td>
                        <td><?php echo $linha["placa"]; ?></td>
                        <td><img src="<?php echo imagemCarro($linha["aluguel"])?>"></td>
                        <td>
                            <div class="col">
                                <input type="hidden" name="ok" id="ok" />
                                <a href="alugarCarro.php?id=<?php echo $linha["id_carro"] ?>" onclick="return confirm('Deseja realmente alugar este Carro?')">
                                    <button type="button" class="btn btn-success col-5"<?php echo habilitarBotao($linha["aluguel"])?>>Alugar</button>
                                </a>
                                <a href="devolver.php?id=<?php echo $linha["id_carro"]?>" onclick="return confirm('Deseja realmente devolver este Carro?')">
                                    <button type="button" class="btn btn-danger col-5"<?php echo habilitarBotao(!$linha["aluguel"])?>>Devolver</button>
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
</div>
</body>
</html>