<?php
include('menu.php');
require_once("../model/Conexao.php");
require_once('../controller/ControllerAlugar.php');
require_once("../model/Alugar.php");
ProcessoAlugar('consultarHistorico'); // ----- PASSA O PROCESSO AO CONTROLE -----
?>

<!doctype html>
<html lang="en">

<body>
<div class="container col-auto">

    <div id="tabela" class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano</th>
                <th scope="col">Data Inicial</th>
                <th scope="col">Data Final</th>
                <th scope="col">Valor Total</th>

            </tr>
            </thead>
            <tbody>
            <?php
            while($linha = mysqli_fetch_assoc($rs)) {
                ?>

                <tr>
                    <td><?php echo $linha["nome"]?></td>
                    <td><?php echo utf8_encode($linha["modelo"])?></td>
                    <td><?php echo $linha["ano"]?></td>
                    <td><?php echo date('d/m/Y',  strtotime($linha["data_inicio"]));?></td>
                    <td><?php echo date('d/m/Y',  strtotime($linha["data_fim"]));?></td>
                    <td>R$ <?php echo $linha["valor_total"];?>,00</td>
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