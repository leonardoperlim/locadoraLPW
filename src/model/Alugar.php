<?php

require_once('Conexao.php');

class Alugar {

    Private $id_clientes;
    Private $id_carro;
    Private $data_inicio;
    Private $data_fim;
    Private $total;

    public function incluir($id_clientes, $id_carro, $data_inicio, $data_fim, $total) {

        $insert = "insert into alugar(id_clientes, id_carro, data_inicio, data_fim, valor_total, ativo)values('$id_clientes','$id_carro','$data_inicio','$data_fim','$total',1)";

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


    }

    public function alterar($id) {

        $update = "update alugar set ativo = 0 where id_alugar = '{$id}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;
    }

    public function aluguel($id_clientes, $id_carro) {

        $update = "update carro set aluguel = 1 where id_carro = '{$id_carro}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;

        $update = "update cliente set disponivel = 1 where id_clientes = '{$id_clientes}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;
    }

    public function devolver($id_alugar, $id_clientes, $id_carro){

        $update = "update alugar set ativo = 0 where id_alugar = '{$id_alugar}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;

        $update = "update carro set aluguel = 0 where id_carro = '{$id_carro}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;

        $update = "update cliente set disponivel = 0 where id_clientes = '{$id_clientes}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;


    }
}
    function calculaAlugel($data_inicio, $data_fim, $diaria){

        //return $diaria*date_diff($data_fim, $data_inicio)->format('%d');//days

        $data1 = strtotime($data_inicio);
        $data2 = strtotime($data_fim);

        $total = $diaria*(($data2 - $data1) /86400);

        return $total;


    }