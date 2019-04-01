<?php
require_once("../model/Conexao.php");
require_once('../controller/ControllerCarro.php');

ProcessoCarro('incluir'); // ----- PASSA O PROCESSO AO CONTROLE ----- //
?>
<!doctype html>
<html lang="en">
<?php include('./default.php');?>
<body>
<div class="container col-auto">

    <div class="p-3 mb-2 bg-primary text-white text-center col-12">
        <h3>Adicionar Carro</h3>
    </div>

    <form action="incluirCarro.php" method="post">
        <div class="form-group row">
            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca do Carro">
            </div>
        </div>
        <div class="form-group row">
            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
            </div>
        </div>
        <div class="form-group row">
            <label for="ano" class="col-sm-2 col-form-label">Ano</label>
            <div class="col-sm-10">
                <input type="number_format" class="form-control" id="ano" name="ano" placeholder="Ano">
            </div>
        </div>
        <div class="form-group row">
            <label for="cor" class="col-sm-2 col-form-label">Cor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cor" name="cor" placeholder="Cor">
            </div>
        </div>
        <div class="form-group row">
            <label for="placa" class="col-sm-2 col-form-label">Placa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="placa" name="placa" placeholder="Ex: HDR3987">
            </div>
        </div>
        <div class="form-group row">
            <label for="valor_diaria" class="col-sm-2 col-form-label">Diária</label>
            <div class="col-sm-10">
                <input type="number_fotmat" class="form-control" id="valor_diaria" name="valor_diaria" placeholder="Valor diária">
            </div>
        </div>
        <input type="hidden" name="ok" id="ok" />
        <button type="submit" class="btn btn-success col-md-12">Adicionar</button>
    </form>
</div>
</body>
</html>