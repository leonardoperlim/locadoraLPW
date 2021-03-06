<?php
require_once("../model/Conexao.php");
require_once('../controller/ControllerCliente.php');
ProcessoCliente('incluir'); // ----- PASSA O PROCESSO AO CONTROLE ----- //
?>
<!doctype html>
<html lang="en">
<?php include('./default.php');?>
<body>
<div class="container col-auto">

    <div class="p-3 mb-2 bg-primary text-white text-center col-12">
        <h3>Adicionar Cliente</h3>
    </div>

    <form action="incluirCliente.php" method="post">
        <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Cliente">
            </div>
        </div>
        <div class="form-group row">
            <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
            </div>
        </div>
        <div class="form-group row">
            <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
            <div class="col-sm-10">
                <input type="number_format" class="form-control" id="cpf" name="cpf" placeholder="CPF">
            </div>
        </div>
        <div class="form-group row">
            <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sexo" name="sexo" placeholder="M ou F">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
        </div>
        <input type="hidden" name="ok" id="ok" />
        <button type="submit" class="btn btn-success col-md-12">Adicionar</button>
    </form>
</div>
</body>
</html>