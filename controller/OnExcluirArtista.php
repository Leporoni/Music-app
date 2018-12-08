<?php
$id = $_GET['id'];
require_once '../controller/ArtistaController.php';
echo 'entrou';
$artistaController = new ArtistaController();
$sucesso = $artistaController->deleteArtista($id);
if($sucesso) {
    header("location: ../view/Home.php?");
}else{
    echo 'erro';
}


