<?php
// PostDAO.php
class PostDAO
{
    public function inserir($post)
    {
        echo ('<br>');
        var_dump($post);
        try {
            $sql = 'INSERT INTO post (data_, pagamento, descricao, idUsuario, habilidade, titulo)
                    VALUES (:data_, :pagamento, :descricao, :idUsuario, :habilidade, :titulo)';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':data_', $post->getData());
            $consulta->bindValue(':titulo', $post->getTitulo());
            $consulta->bindValue(':pagamento', $post->getPagamento());
            $consulta->bindValue(':descricao', $post->getDescricao());
            $consulta->bindValue(':idUsuario', $post->getIdUsuario());
            $consulta->bindValue(':habilidade', $post->getHabilidade());
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
                data_ = :data_
                cache = :cache,
                descricao = :descricao,
                idUsuario = :idUsuario,
                idHabilidade = :idHabilidade
                
            WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':data', $post->getData());
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
    public function listarHome($usuario)
    {
        try {
            $sql = 'SELECT * FROM post WHERE idUsuario != :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':id', $usuario->getId());
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar Projetos <br>" . $e . '<br>';
        }
    }
    public function buscar($coluna, $valor)
    {
        try {
            $sql = "SELECT * FROM post WHERE $coluna LIKE :valor";
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":valor", "%$valor%");
            $consulta->execute();
            if ($coluna == "id") {
                return $consulta->fetch(PDO::FETCH_ASSOC);
            } else {
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            print "Erro ao buscar usuario <br>" . $e->getMessage() . '<br>';
        }
    }
    public function listarMatch($post)
    {
        try {
            $sql = 'SELECT * FROM usuario_post WHERE idPost = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':id', $post);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar Projetos <br>" . $e . '<br>';
        }
    }
}
