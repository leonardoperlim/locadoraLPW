<?php

require_once('Conexao.php');

class Carro {

    Private $marca;
    Private $modelo;
    Private $ano;
    Private $cor;
    Private $placa;
    private $diaria;

    public function incluir($marca, $modelo, $ano, $cor, $placa, $diaria) {

        $insert = "insert into carro(marca, modelo, ano, cor, placa, valor_diaria)values('$marca','$modelo','$ano','$cor','$placa', '$diaria')";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($insert);
    }

    public function consultar($sql) {

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($sql);

        $this->Linha = @mysqli_affected_rows($Acesso->result);

        $this->Result = $Acesso->result;
    }

    public function excluir($id) {

        $delete = "delete from carro where id_carro = {$id}";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($delete);
    }

    public function alterar($marca, $modelo, $ano, $cor, $placa, $id, $diaria) {

        $update = "update carro set marca = '{$marca}', modelo = '{$modelo}', ano = '{$ano}', cor = '{$cor}', placa = '{$placa}', valor_diaria = '{$diaria}' where id_carro = '{$id}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;
    }


}

    function imagemCarro($disponivel){

        if($disponivel){
            $foto = "../../imagens/car_block.png";
        }else{
            $foto = "../../imagens/car_unblock.png";
        }

        return $foto;
    }

    function habilitarBotao($disponivel){

        $botao = '';

        if($disponivel){
            $botao = "disabled";
        }

        return $botao;
    }

