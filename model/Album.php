<?php

class Albuns {
    
    private $id;
    
    private $nome;
    
    private $ano;
    
    private $artista;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getAno() {
        return $this->ano;
    }

    function getArtista() {
        return $this->artista;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setArtista($artista) {
        $this->artista = $artista;
    }
}
