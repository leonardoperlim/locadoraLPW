<?php
require_once("../model/Conexao.php");
require_once('../controller/ControllerCarro.php');
ProcessoCarro('consultar');
ProcessoCarro('editar'); // ----- PASSA O PROCESSO AO CONTROLE ----- //
?>
<!doctype html>
<html lang="en">
<?php include('default.php');?>
<body>
<div class="container col-auto">

    <div class="p-3 mb-2 bg-primary text-white text-center col-12">
        <h3>Editar Carro</h3>
    </div>

    <form action="editarCarro.php" method="post">

        <?php

        while($linha = mysqli_fetch_assoc($rs)) {

            ?>
            <div class="form-group row">
                <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="marca" name="marca" value="<?php echo utf8_encode($linha["marca"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo utf8_encode($linha["modelo"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="ano" class="col-sm-2 col-form-label">Ano</label>
                <div class="col-sm-10">
                    <input type="number_format" class="form-control" id="ano" name="ano" value="<?php echo utf8_encode($linha["ano"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="cor" class="col-sm-2 col-form-label">Cor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cor" name="cor" value="<?php echo utf8_encode(utf8_encode($linha["cor"]))?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="placa" class="col-sm-2 col-form-label">Placa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="placa" name="placa" value="<?php echo utf8_encode($linha["placa"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="valor_diaria" class="col-sm-2 col-form-label">Diária</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="valor_diaria" name="valor_diaria" value="<?php echo utf8_encode($linha["valor_diaria"])?>">
                    <input type="hidden" name="id" value="<?php echo $linha["id_carro"] ?>">
                </div>
            </div>

            <?php
        }
        ?>
        <input type="hidden" name="ok" id="ok" />
        <button type="submit" class="btn btn-success col-md-12">Editar</button>
    </form>
</div>
</body>
</html>