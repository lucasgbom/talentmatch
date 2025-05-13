<?php
// PostDAO.php
class PostDAO
{
    public function inserir($post)
    {
        try {
            $sql = 'INSERT INTO post (dataInicio, dataFim, requisitos, cache, descricao, idUsuario, idHabilidade)
                    VALUES (:dataInicio, :dataFim, :requisitos, :cache, :descricao, :idUsuario, :idHabilidade)';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':dataInicio', $post->getDataInicio());
            $consulta->bindValue(':dataFim', $post->getDataFim());
            $consulta->bindValue(':requisitos', $post->getRequisitos());
            $consulta->bindValue(':cache', $post->getCache());
            $consulta->bindValue(':descricao', $post->getDescricao());
            $consulta->bindValue(':idUsuario', $post->getIdUsuario());
            $consulta->bindValue(':idHabilidade', $post->getIdHabilidade());
            $consulta->execute();
            $post->setId(Conexao::getConexao()->lastInsertId());
            return true;
        } catch (Exception $e) {
            echo "Erro ao inserir post: " . $e->getMessage();
            return false;
        }
    }

    public function atualizar($post)
    {
        try {
            $sql = 'UPDATE post SET 
                dataInicio = :dataInicio,
                dataFim = :dataFim,
                requisitos = :requisitos,
                cache = :cache,
                descricao = :descricao,
                idUsuario = :idUsuario,
                idHabilidade = :idHabilidade
            WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':dataInicio', $post->getDataInicio());
            $consulta->bindValue(':dataFim', $post->getDataFim());
            $consulta->bindValue(':requisitos', $post->getRequisitos());
            $consulta->bindValue(':cache', $post->getCache());
            $consulta->bindValue(':descricao', $post->getDescricao());
            $consulta->bindValue(':idUsuario', $post->getIdUsuario());
            $consulta->bindValue(':idHabilidade', $post->getIdHabilidade());
            $consulta->bindValue(':id', $post->getId());
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            echo "Erro ao atualizar post: " . $e->getMessage();
            return false;
        }
    }

    public function listarTodos()
    {
        try {
            $sql = 'SELECT * FROM post';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar posts: " . $e->getMessage();
        }
    }

    public function listarPorUsuario($usuario)
    {
        try {
            $sql = 'SELECT * FROM post WHERE idUsuario = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':id', $usuario->getId());
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao listar posts do usuário: " . $e->getMessage();
        }
    }
}
