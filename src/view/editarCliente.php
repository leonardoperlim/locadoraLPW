<?php
require_once("../model/Conexao.php");
require_once('../controller/ControllerCliente.php');
ProcessoCliente('consultar');
ProcessoCliente('editar'); // ----- PASSA O PROCESSO AO CONTROLE ----- //
?>
<!doctype html>
<html lang="en">
<?php include('default.php');?>
<body>
<div class="container col-auto">

    <div class="p-3 mb-2 bg-primary text-white text-center col-12">
        <h3>Editar Cliente</h3>
    </div>

    <form action="editarCliente.php" method="post">

        <?php

        while($linha = mysqli_fetch_assoc($rs)) {

        ?>
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo utf8_encode($linha["nome"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $linha["telefone"]?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input type="number_format" class="form-control" id="cpf" name="cpf" value="<?php echo utf8_encode($linha["cpf"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo utf8_encode($linha["sexo"])?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo utf8_encode($linha["email"])?>">
                    <input type="hidden" name="id" value="<?php echo $linha["id_clientes"] ?>">
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