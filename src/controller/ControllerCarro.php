<?php

require_once("../model/Carro.php");

function ProcessoCarro($Processo) {

    switch ($Processo) {
        case 'incluir':
            if (isset($_POST['ok'])) {

                global $linha;
                global $rs;

                $carro = new Carro();

                $carro->consultar("select * from carro");
                $linha = $carro->Linha;
                $rs = $carro->Result;


                $carro->incluir(utf8_decode($_POST['marca']), $_POST['modelo'], $_POST['ano'], $_POST['cor'], $_POST['placa'], $_POST['valor_diaria']);
                echo '<script>alert("Cadastrado com sucesso !");</script>';
                echo '<script>window.location="carros.php";</script>';
            }

            break;

        case 'consultar':

            global $linha;
            global $rs;

            $carro = new Carro();

            if(isset($_GET["excluir"])){
                $carro->excluir($_GET['excluir']);
                echo '<script>alert("Excluido com sucesso !");</script>';
                echo '<script>window.location="carros.php";</script>';
            }

            if(isset($_GET["id"])){
                $carro->consultar("select * from carro where id_carro = {$_GET["id"]}");
            }else{
                $carro->consultar("select * from carro order by marca");
            }

            $linha = $carro->Linha;
            $rs = $carro->Result;

            break;


        case 'editar':

            if (isset($_POST['ok'])) {

                global $linha;
                global $rs;

                $carro = new Carro();

                $carro->consultar("select * from carro where id_carro = {$_POST['id']}");
                $linha = $carro->Linha;
                $rs = $carro->Result;

                $carro->alterar(utf8_decode($_POST['marca']), utf8_decode($_POST['modelo']), $_POST['ano'], utf8_decode($_POST['cor']), $_POST['placa'], $_POST['id'], $_POST['valor_diaria']);
                echo '<script>alert("Alterado com sucesso !");</script>';
                echo '<script>window.location="carros.php";</script>';
            }

            break;

    }

}
