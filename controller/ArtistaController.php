<?php

class ArtistaController {

    public function __construct() {
        
    }    
    
    public function getArtista($id) {
        require_once  '../../model/Usuario.class.php';
        require_once '../../dao/UsuarioDAO.class.php';
        require_once '../../dao/ArtistaDAO.class.php';
        require_once '../../dao/Conexao.class.php';

        $artistaDAO = new ArtistaDAO();
        
        $artista = $artistaDAO->select($id); 
        return $artista;
    }
    
    public function saveArtista($artista) {
        require_once '../../dao/Conexao.class.php';
        require_once '../../dao/ArtistaDAO.class.php';
        $artistaDAO = new ArtistasDAO();
        $sucesso = $artistaDAO->inserir($artista);
        return $sucesso;
    }

    public function editArtista($artista) {
        $artistaDAO = new ArtistasDAO();
        $sucesso = $artistaDAO->update($artista);
        return $sucesso;
    }
    
        public function deleteArtista($id) {
        require_once '../../dao/Conexao.class.php';
        require_once '../../dao/ArtistaDAO.class.php';
        $artistaDAO = new ArtistasDAO();
        $sucesso = $artistaDAO->delete($id);
        return $sucesso;
    }
}


