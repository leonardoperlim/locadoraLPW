<?php
require_once("../model/Conexao.php");
require_once('../controller/ControllerAlugar.php');
ProcessoAlugar('consultaDevolver')
?>

<!doctype html>
<html lang="en">
<?php include('./default.php');?>
<body>
<div class="container col-auto">

    <div class="p-3 mb-2 bg-primary text-white text-center col-12">
        <h3>Devolver Carro</h3>
    </div>

    <form action="devolver.php" method="post">
        <?php
        while($linha = mysqli_fetch_assoc($rs)) {
            ?>

            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="nome" name="nome" value="<?php echo utf8_encode($linha["nome"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="marca" name="marca" value="<?php echo utf8_encode($linha["marca"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="modelo" name="modelo" value="<?php echo utf8_encode($linha["modelo"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="ano" class="col-sm-2 col-form-label">Ano</label>
                <div class="col-sm-10">
                    <input type="number_format" readonly="readonly" class="form-control" id="ano" name="ano" value="<?php echo utf8_encode($linha["ano"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="cor" class="col-sm-2 col-form-label">Cor</label>
                <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="cor" name="cor" value="<?php echo utf8_encode(utf8_encode($linha["cor"]))?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="placa" class="col-sm-2 col-form-label">Placa</label>
                <div class="col-sm-10">
                    <input type="text" readonly="readonly" class="form-control" id="placa" name="placa" value="<?php echo utf8_encode($linha["placa"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="data_inicio" class="col-sm-2 col-form-label">Data inicial</label>
                <div class="col-sm-10">
                    <input type="date" readonly="readonly" class="form-control" id="data_inicio" name="data_inicio" value="<?php echo $linha['data_inicio'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="data_fim" class="col-sm-2 col-form-label">Data Final</label>
                <div class="col-sm-10">
                    <input type="date" readonly="readonly" class="form-control" id="data_fim" name="data_fim" value="<?php echo $linha['data_fim']?>" >
                </div>
            </div>

            <div class="form-group row">
                <label for="valor_total" class="col-sm-2 col-form-label">Valor</label>
                <div class="col-sm-10">
                    <input type="number_format" readonly="readonly" class="form-control" id="valor_total" name="valor_total" value="<?php echo $linha['valor_total']?>">
                    <input type="hidden" name="id_carro" value="<?php echo $linha["id_carro"] ?>">
                    <input type="hidden" name="id_clientes" value="<?php echo $linha["id_clientes"] ?>">
                    <input type="hidden" name="id_alugar" value="<?php echo $linha["id_alugar"] ?>">
                </div>
            </div>
            <?php
        }
        ?>

        <input type="hidden" name="ok" id="ok" />
        <button type="submit" class="btn btn-success col-md-12">Devolver</button>
    </form>
</div>
</body>
</html>
