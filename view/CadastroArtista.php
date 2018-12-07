<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php
        require_once '../paginas/cabecario.php';
        require_once '../../utils/Message.php';
        require_once '../../controller/home/ArtistaController.php';
        require_once '../../model/Artista.php';

        $action = $_GET['action'];
        $artistaEdicao = null;
        if ($action == "editar") {
            $artistaController = new ArtistaController();
            $artistaEdicao = $artistaController->getArtista($_SESSION['id']);            
        }
        ?>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/estilo.css">

        <meta charset="UTF-8">
        <title>Cadastro</title>


    </head>
    <body>
        <div id="form-container">
            <div class="panel" id="form-box">

                <form  action ="CadastroArtista.php?<?php echo "action=" . $action ?>"  method="post" id="form-cadastro">
                    <h1 class="text-center"><?php echo $action . " " ?> artista</h1>

                    <div class="form-group">
                        <label class="sr-only" for="id">Id</label>
                        <input type="number" name="id" class="form-control" placeholder="Id" value="<?php if ($artistaEdicao != null) echo $artistaEdicao->getId() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="login">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?php if ($artistaEdicao != null) echo $artistaEdicao->getNome() ?>">
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="senha">Twitter Handle</label>
                        <input type="text" name="twitterHandle" id="twitterHandle" class="form-control" placeholder="Twitter Handle" value="<?php if ($artistaEdicao != null) echo $artistaEdicao->getTwitterHandle() ?>">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Salvar" id="btn-submit" class="btn btn-primary form-control">
                    </div>

                    <?php
                    //Após o clique de salvar
                    if ($_POST) {
                        $artista = new Artista();
                        $artistaController = new ArtistaController();
                        
                        //Atribuindo valores dos campos a instancia de produto
                        $artista->setId($_POST["id"]);
                        $artista->setNome($_POST["nome"]);
                        $artista->setTwitterHandle($_POST["titterHandle"]);                        
                                               
                        //Validação de campos vazios
                        if (($artista->getId() == "")) {
                            Message::alert("Campo 'Id' não pode ficar vazio");
                        } else if (($artista->getNome() == "")) {
                            Message::alert("Campo 'Nome' não pode ficar vazio");
                        } else if ($artista->getTwitterHandle() == 0) {
                            Message::alert("Campo 'TwitterHandle' deve possuir um número maior do que 0");                        
                        } else {
                            //Caso esteja cadastrando um novo artista
                            if ($action == "cadastrar") {
                                $sucesso = $artistaController->saveArtista($artista);
                                if ($sucesso) {
                                    Message::succes("Artista cadastrado com sucesso");
                                } else {
                                    Message::error("Erro ao cadastrar artista !");
                                }
                            } else if ($action == "editar") {
                                //Caso esteja editando um artista já existente
                                $artista->setId($_SESSION['id']); //Atribuição do id do artista, já que ele já existe
                                $sucesso = $artistaController->editArtista($artista);
                                if ($sucesso) {
                                    header("location: ../view/paginas/Home.php?");
                                } else {
                                    Message::error("Erro ao editar artista !");
                                }
                            }
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>
