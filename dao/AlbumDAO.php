<?php

class AlbumDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($album) {
        $sql = "INSERT INTO albuns (id, nome, ano, artista) VALUES ('" . $album->getId() . "' ,'" . $album->getNome() . "' , '" . $album->getAno() . "' ,'" . $album->getArtista() . "');";
        if (mysqli_query($this->conexao->getConection(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($album) {
        $sql = "UPDATE albuns set nome ='" . $album->getNome() . "' ,ano ='" . $album->getAno() . "' ,artista='" . $album->getArtista() . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($idAlbum) {
        $sql = "DELETE FROM  albuns where id ='" . $idAlbum . "' ;";
        if ($this->conexao->getConection()->query($sql)) {
            return true;
        } else {
            return false;
        }
    }    
}




