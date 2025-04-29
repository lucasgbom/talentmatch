<?php
include_once "./app/conexao/Conexao.php";
include_once "./app/dao/ArtistaDAO.php";
include_once "./app/model/Artista.php";

$artista = new Artista();
$artistaDAO = new ArtistaDAO();

if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $artistas = $artistaDAO->buscar('id', $_GET['pesquisa']);
} else {
    $artistas = $artistaDAO->listarTodos();
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>CRUD Simples PHP</title>
</head>

<body>
    <div class="container">
        <h1 class="row mt-1"><a href="artista.php" style="text-decoration: none">Gerenciar artistas</a> </h1>
        <div class="row mt-1">
            <div class="col-md-6">
                <button type="button" class="btn  btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar">
                    Cadastrar
                </button>
            </div>
            <div class="col-md-6">
                <form>
                    <input type="text" name="pesquisa" placeholder="Pesquisa" class="form-control" />
                </form>
            </div>
        </div>
        <hr>
        <?php
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == "adicionado" || $_GET['msg'] == "editado" || $_GET['msg'] == "apagado") {
                echo ("
                    <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                      Registro <strong>" . ucfirst($_GET['msg']) . "</strong> com sucesso!
                      <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>");
            } else if (isset($_GET['erro'])) {
                echo ("
                    <div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                      Ocorreu um erro ao realizar esta <strong>operação</strong>.
                      <button type='button' class='btn-close btn-sm' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>");
            }
        }
        ?>
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>nome</th>

                        <th>senha</th>

                        <th>endereco</th>

                        <th>foto_perfil</th>

                        <th>biografia</th>

                        <th>email</th>

                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($artistas as $artista) : ?>
                        <tr class="text-center align-middle">
                            <td><?= $artista['nome'] ?></td>
                            <td><?= $artista['senha'] ?></td>
                            <td><?= $artista['endereco'] ?></td>
                            <td><?= $artista['fotoPerfil'] ?></td>
                            <td><?= $artista['biografia'] ?></td>
                            <td><?= $artista['email'] ?></td>


                            <td class="text-center col-2">
                                <div class="row" style="--bs-gutter-x: 0rem;">
                                    <div class="col-md-12 col-lg-6 mt-1 mb-1">
                                        <button type="button" class="btn  btn-warning" data-bs-toggle="modal" data-bs-target="#editar<?= $artista['id'] ?>">
                                            Editar
                                        </button>
                                    </div>
                                    <div class="col-md-12 col-lg-6 mt-1 mb-1">
                                        <button type="button" class="btn  btn-danger" data-bs-toggle="modal" data-bs-target="#excluir<?= $artista['id'] ?>">
                                            Excluir
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Editar-->
                        <div class="modal fade" id="editar<?= $artista['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/artistaController.php" method="POST">
                                            <div class="row">
                                                Nome: <input type="text" name="nome" value="<?= $artista['nome'] ?>" class="form-control" />
                                                Senha: <input type="text" name="senha" value="<?= $artista['senha'] ?>" class="form-control" />
                                                Endereco:<input type="text" name="endereco" value="<?= $artista['endereco'] ?>" class="form-control" />
                                                Foto do perfil: <input type="text" name="foto" value="<?= $artista['fotoPerfil'] ?>" class="form-control" />
                                                Biografia: <input type="text" name="descricao" value="<?= $artista['biografia'] ?>" class="form-control" />
                                                Email: <input type="email" name="email" value="<?= $artista['email'] ?>" class="form-control" />
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-right">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $artista['id'] ?>" />
                                                    <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal Excluir-->
                        <div class="modal fade" id="excluir<?= $artista['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Excluir registro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">Você deseja realmente excluir esse registro?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href="app/controller/artistaController.php?deletar=<?= $artista['id'] ?>">
                                            <button class="btn  btn-danger" type="button">Excluir</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Modal Cadastrar-->
    <div class="modal fade" id="cadastrar">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="app/controller/artistaController.php" method="POST">
                        <div class="row">
                            <div class='col-md-6'><label>Senha</label><input type='text' name='senha' class='form-control' /></div>

                            <div class='col-md-6'><label>Login</label><input type='text' name='login' class='form-control' /></div>

                            <div class='col-md-6'><label>Foto</label><input type='text' name='foto' class='form-control' /></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <button class="btn btn-primary float-end" type="submit" name="cadastrar">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>