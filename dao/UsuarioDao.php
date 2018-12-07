<?php

class UsuarioDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($usuario) { 

        $sql = "INSERT INTO usuario (id, login, senha) VALUES ('" . $usuario->getId() . "' ,'" . $usuario->getLogin() . "' , '" . md5($usuario->getSenha()) . "')";

        if (mysqli_query($this->conexao->getConection(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($usuario) {
        $sql = "UPDATE usuario set login ='" . $usuario->getLogin() . "' where id = '" . $usuario->getId() . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM  usuario where id ='" . $id . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function select($login) {
        $usuario = new Usuario();        
        $sql = "SELECT * FROM  usuario where login ='" . $login . "' ;";
        $result = mysqli_query($this->conexao->getConection(), $sql);

        if ($result->num_rows > 0) {
            // output data of each row
            if ($row = $result->fetch_assoc()) {           
                $usuario->setId($row["id"]); 
                $usuario->setLogin($row["login"]);
                $usuario->setSenha($row["senha"]);
               
                return $usuario;
            }
        } else {
            echo "Deu erro no select";
            return null;
        }
    }    

    public function validaLogin($login, $senha) {
        $sql = "SELECT * FROM usuario WHERE login = '" . $login . "'  and senha ='" . md5($senha) . "'";
        $execute = mysqli_query($this->conexao->getConection(), $sql);

        if (mysqli_num_rows($execute) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

