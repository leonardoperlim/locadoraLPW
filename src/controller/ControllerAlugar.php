<?php

require_once("../model/Alugar.php");

function ProcessoAlugar($Processo) {

    switch ($Processo) {
        case 'incluir':
            if (isset($_POST['ok'])) {

                global $linha;
                global $rs;

                $alugar = new Alugar();

                $alugar->consultar("select * from alugar");
                $linha = $alugar->Linha;
                $rs = $alugar->Result;

                $total = calculaAlugel($_POST['data_inicio'], $_POST['data_fim'], $_POST['valor_diaria']);
                $alugar->incluir($_POST['id_clientes'], $_POST['id_carro'], $_POST['data_inicio'], $_POST['data_fim'], $total);
                $alugar->aluguel($_POST['id_clientes'], $_POST['id_carro']);
                echo '<script>alert("Alugado com sucesso !");</script>';
                echo '<script>window.location="aluguel.php";</script>';

            }

            break;

        case 'consultar':

            global $linha;
            global $rs;

            $alugar = new Alugar();

            if(isset($_GET["excluir"])){
                $alugar->excluir($_GET['excluir']);
                echo '<script>alert("Excluido com sucesso !");</script>';
                echo '<script>window.location="aluguel.php";</script>';
            }

            if(isset($_GET["id"])){
                $alugar->consultar("select * from alugar where id_alugar = {$_GET["id"]}");
            }else{
                $alugar->consultar("select * from alugar");
            }

            $linha = $alugar->Linha;
            $rs = $alugar->Result;

            break;


        case 'editar':

            if (isset($_POST['ok'])) {

                global $linha;
                global $rs;

                $alugar = new Alugar();

                $alugar->consultar("select * from alugar where id_alugar = {$_POST['id']}");
                $linha = $alugar->Linha;
                $rs = $alugar->Result;

                $alugar->alterar(utf8_decode($_POST['marca']), utf8_decode($_POST['modelo']), $_POST['ano'], utf8_decode($_POST['cor']), $_POST['placa'], $_POST['id'], $_POST['valor_diaria']);
                echo '<script>alert("Alterado com sucesso !");</script>';
                echo '<script>window.location="aluguel.php";</script>';
            }

            break;

        case 'consultaDevolver':


                global $linha;
                global $rs;

                $alugar = new Alugar();
                if(isset($_POST['ok'])) {
                    $alugar->devolver($_POST['id_alugar'], $_POST['id_clientes'], $_POST['id_carro']);
                    echo '<script>alert("Devolvido com sucesso !");</script>';
                    echo '<script>window.location="aluguel.php";</script>';
                }else{
                    $alugar->consultar("SELECT al.id_alugar, cli.id_clientes, car.id_carro, cli.nome, car.marca, car. modelo, car.ano, car.cor, car.placa, al.data_inicio, al.data_fim, al.valor_total FROM alugar al, cliente cli, carro car WHERE {$_GET['id']} = al.id_carro and {$_GET['id']} = car.id_carro and al.id_clientes = cli.id_clientes and al.ativo = 1");
                    $linha = $alugar->Linha;
                    $rs = $alugar->Result;
                }
            break;

        case 'consultarHistorico':

            global $linha;
            global $rs;

            $alugar = new Alugar();

            $alugar->consultar("SELECT cli.nome, car.marca, car. modelo, car.ano, car.cor, car.placa, al.data_inicio, al.data_fim, al.valor_total FROM alugar al, cliente cli, carro car WHERE car.id_carro = al.id_carro and car.id_carro = car.id_carro and al.id_clientes = cli.id_clientes");

            $linha = $alugar->Linha;
            $rs = $alugar->Result;

            break;

    }

}
