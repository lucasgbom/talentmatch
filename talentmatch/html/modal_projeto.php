<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.cs">
</head>

<body>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarProjeto">
        Criar/Editar Projeto.
    </button>
    <div class="modal fade" id="editarProjeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="projetoController.php" method="POST">
                        <div class="row">
                            Título: <input type="text" name="nome" value="<?= $artista['nome'] ?>" class="form-control" />
                            Descrição: <input type="text" name="senha" value="<?= $artista['senha'] ?>" class="form-control" />
                            Vídeo:<input type="text" name="endereco" value="<?= $artista['endereco'] ?>" class="form-control" />
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
</body>
<script src="../bootstrap/bootstrap.js"></script>

</html>