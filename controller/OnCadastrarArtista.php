<?php
session_start();
$_SESSION['idArtista'] = "";
header("location: ../view/CadastroArtista.php?action=cadastrar");

