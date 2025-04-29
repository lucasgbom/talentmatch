<?php session_start();
$_SESSION['idArtista'] = 1; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.cs">
</head>

<body>
    <?php
    include('../app/conexao/Conexao.php');
    $consulta = Conexao::getConexao()->prepare('SELECT * FROM projeto WHERE idArtista = :idArtista');
    $consulta->bindValue(':idArtista', $_SESSION['idArtista']);
    $consulta->execute();
    $projetos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#criarProjeto">
        Criar Projeto
    </button>
    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Vídeo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projetos as $projeto) : ?>
                    <tr class="text-center align-middle">
                        <td><?= $projeto['titulo'] ?></td>
                        <td><?= $projeto['descricao'] ?></td>
                        <td><?= $projeto['arquivoCaminho'] ?></td>
                        <td class="text-center col-2">
                            <div class="row" style="--bs-gutter-x: 0rem;">
                                <div class="col-md-12 col-lg-6 mt-1 mb-1">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarProjeto<?= $projeto['id'] ?>">
                                        Editar
                                    </button>
                                </div>
                                <div class="col-md-12 col-lg-6 mt-1 mb-1">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluirProjeto<?= $projeto['id'] ?>">
                                        Excluir
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Editar Projeto -->
                    <div class="modal fade" id="editarProjeto<?= $projeto['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Projeto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../app/Controller/ProjetoController.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            Título: <input type="text" name="titulo" value="<?= $projeto['titulo'] ?>" class="form-control" />
                                            Descrição: <input type="text" name="descricao" value="<?= $projeto['descricao'] ?>" class="form-control" />
                                            Vídeo:<input type="file" name="arquivo" class="form-control" />
                                            <input type="hidden" name="tipo" value="editar">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right">
                                                <br>
                                                <input type="hidden" name="id" value="<?= $projeto['id'] ?>" />
                                                <button class="btn btn-primary float-end" type="submit" name="editar">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Excluir Projeto -->
                    <div class="modal fade" id="excluirProjeto<?= $projeto['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Excluir Projeto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Você deseja realmente excluir este projeto?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="../app/Controller/ProjetoController.php" method="POST">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <input type="hidden" name="tipo" value="deletar">
                                        <input type="hidden" name="id" value="<?= $projeto['id'] ?>">
                                        <a href="../app/Controller/ProjetoController.php?id=<?= $projeto['id'] ?>">
                                        <input type="submit" value="Excluir">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</body>
<script src="../bootstrap/bootstrap.js"></script>

</html>