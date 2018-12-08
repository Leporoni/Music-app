<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <link rel="stylesheet" href="../assets/css/estilo.css">

    </head>
    <body>
        <div id="form-container">
            <div class="panel" id="form-box">

                <form action="CadastroUsuario.php" method="post" id="form-cadastro">
                    <h1 class="text-center">Register</h1>                    

                    <div class="form-group">
                        <label class="sr-only" for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Your Login" value="">
                    </div>                   

                    <div class="form-group">
                        <label class="sr-only" for="senha">Password</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Enter your password" value="">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="senha">Confirm your password</label>
                        <input type="password" name="repetirSenha" class="form-control" placeholder="Confirm your password">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Register" id="btn-submit" class="btn btn-primary form-control">
                    </div>

                    <?php
                    if ($_POST) {
                        require_once '../controller/UsuarioController.php';
                        require_once '../model/Usuario.php';
                        require_once '../utils/Message.php';
                        $usuario = new Usuario();
                        $usuarioController = new UsuarioController();

                        //Atribuindo valores dos campos a instancia de usuário
                        $usuario->setId($_POST["id"]);                        
                        $usuario->setLogin($_POST["login"]);
                        $usuario->setSenha($_POST["senha"]);

                        $retorno = $usuarioController->validateUser($usuario, $_POST['repetirSenha']);
                        if ($retorno == "sucesso") {
                            if($usuarioController->saveUser($usuario)){
                            session_start();
                            $_SESSION['login'] = $usuario->getLogin();
                            header("location: ../view/paginas/Home.php?");
                            //Message::succes($usuarioController->saveUser($usuario));
                            }else{
                                Message::error("Erro ao salvar usuário");
                            }
                        } else {
                            Message::error($retorno);
                        }
                    }
                    ?>

                    <div class="form-group">
                        Já é registrado? <a href="index.php?">Efetue login</a>.
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

