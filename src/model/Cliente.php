<?php

require_once('Conexao.php');

class Cliente {

    Private $nome;
    Private $telefone;
    Private $cpf;
    Private $sexo;
    Private $email;

    public function incluir($nome, $telefone, $cpf, $sexo, $email) {

        $insert = "insert into cliente(nome, telefone, cpf, sexo, email)values('$nome','$telefone','$cpf','$sexo','$email')";

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

        $delete = "delete from cliente where id_clientes = {$id}";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($delete);
    }

    public function alterar($nome, $telefone, $cpf, $sexo, $email, $id) {

        $update = "update cliente set nome = '{$nome}', telefone = '{$telefone}', cpf = '{$cpf}', sexo = '{$sexo}', email = '{$email}' where id_clientes = '{$id}'";

        $Acesso = new Acesso();

        $Acesso->Conexao();

        $Acesso->Query($update);

        $this->Result = $Acesso->result;
    }

}

    function pegaNome(){

        global $nomes;
        global $resultadoNomes;

        $cliente = new Cliente();

        $cliente->consultar("SELECT id_clientes, nome FROM cliente where disponivel = 0");
        $nomes = $cliente->Linha;
        $resultadoNomes = $cliente->Result;

    }

    function habilitarBotaoCliente($disponivel){

        $botao = '';

        if($disponivel){
            $botao = "disabled";
        }

        return $botao;
    }

