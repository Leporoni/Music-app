<?php

require_once '../dao/UsuarioDAO.class.php';
require_once '../dao/Conexao.class.php';
require_once '../model/Usuario.class.php';


$login = $_POST['inp_login'];
$senha = $_POST['inp_senha'];


$usuarioDAO = new UsuarioDAO();
$usuario = new Usuario();

$resultado = $usuarioDAO->validaLogin($login, $senha);

if ($resultado) {
    session_start();
    $_SESSION['login'] = $login;
    header("location: ../view/Home.php?");
} else {
    header("location: ../view/index.php?erro=senha");
}

