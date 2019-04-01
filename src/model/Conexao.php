<?php

class Acesso {
    
    public function Conexao() {

        $this->cnx = mysqli_connect("localhost", "root", "", "db_AutoLocadoraCarros");

        if (mysqli_connect_errno()) {
            echo "Conexão com o banco de dados falhou:" . mysqli_connect_error();
        }
    }
    
    public function Query($sql) {
        $this->result = mysqli_query($this->cnx,$sql, MYSQLI_STORE_RESULT);
    }

    public function __destruct() {
        mysqli_close($this->cnx);
    }

}
?> 