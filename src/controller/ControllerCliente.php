<?php

require_once("../model/Cliente.php");

function ProcessoCliente($Processo) {

    switch ($Processo) {
        case 'incluir':
            if (isset($_POST['ok'])) {

                global $linha;
                global $rs;

                $cliente = new Cliente();

                $cliente->consultar("select * from cliente");
                $linha = $cliente->Linha;
                $rs = $cliente->Result;


                $cliente->incluir(utf8_decode($_POST['nome']), $_POST['telefone'], $_POST['cpf'], $_POST['sexo'], $_POST['email']);
                echo '<script>alert("Cadastrado com sucesso !");</script>';
                echo '<script>window.location="clientes.php";</script>';
            }

            break;

        case 'consultar':

            global $linha;
            global $rs;

            $cliente = new Cliente();

            if (isset($_GET["excluir"])) {
                $cliente->excluir($_GET['excluir']);
                echo '<script>alert("Excluido com sucesso !");</script>';
                echo '<script>window.location="clientes.php";</script>';
            }

            if (isset($_GET["id"])) {
                $cliente->consultar("select * from cliente where id_clientes = {$_GET["id"]}");
            } else {
                $cliente->consultar("select * from cliente");
            }

            $linha = $cliente->Linha;
            $rs = $cliente->Result;

            break;


        case 'consultarAluguel':

            global $linha;
            global $rs;

            $cliente = new Cliente();

            $cliente->consultar("SELECT c.nome, car.modelo, car.ano, car.data_inicio, car.data_fim, car.valor_total
                                      FROM carro car
                                      INNER JOIN cliente c on c.id_carro = car.id_carro
                                      GROUP BY car.data_fim");

            $linha = $cliente->Linha;
            $rs = $cliente->Result;

            break;

        case 'devolver':

            if(isset($_POST['ok'])) {


            global $linha;
            global $rs;

            $cliente = new Cliente();

            print_r($_GET);

            echo '<script>alert("Entrou na devolução caralho!");</script>';
            $cliente->alterarAluguel($_POST['id'], $_POST['id_clientes'], 0);
            echo '<script>alert("Devolvido com sucesso !");</script>';
            echo '<script>window.location="aluguel.php";</script>';


            }

            break;

        case 'editar':

            if (isset($_POST['ok'])) {

                global $linha;
                global $rs;

                $cliente = new Cliente();

                $cliente->consultar("select * from cliente where id_clientes = {$_POST['id']}");
                $linha = $cliente->Linha;
                $rs = $cliente->Result;

                $cliente->alterar(utf8_decode($_POST['nome']), $_POST['telefone'], $_POST['cpf'], $_POST['sexo'], $_POST['email'], $_POST['id']);
                echo '<script>alert("Alterado com sucesso !");</script>';
                echo '<script>window.location="clientes.php";</script>';
            }

            break;


        case 'alugar':

            if(isset($_POST['ok'])){

                global $linha;
                global $rs;

                $cliente = new Cliente();

                $cliente->consultar("select * from cliente where id_clientes = {$_POST['id_clientes']}");
                $linha = $cliente->Linha;
                $rs = $cliente->Result;


                $cliente->alterarAluguel($_POST['id'], $_POST['id_clientes'], 1);
                echo '<script>alert("Alugado com sucesso !");</script>';
                echo '<script>window.location="aluguel.php";</script>';
            }

            break;

    }

}
