<?php

class ArtistasDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($artista) {
        $sql = "INSERT INTO artistas (id, nome, twiiterHandle) VALUES ('" . $artista->getId() . "' ,'" . $artista->getNome() . "' , '" . $artista->getTwitterHandle() . "');";
        if (mysqli_query($this->conexao->getConection(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($artista) {
        $sql = "UPDATE artistas set nome ='" . $artista->getNome() . "' ,qtd ='" . $artista->getTwitterHandle() . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($idArtista) {
        $sql = "DELETE FROM  artitas where id ='" . $idArtista . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }    
}


