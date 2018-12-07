<?php

class Artistas {
    
    private $id;
    
    private $nome;
    
    private $twitterHandle;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTwitterHandle() {
        return $this->twitterHandle;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTwitterHandle($twitterHandle) {
        $this->twitterHandle = $twitterHandle;
    }    
}
