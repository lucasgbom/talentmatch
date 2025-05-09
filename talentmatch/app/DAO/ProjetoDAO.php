<?php
// Editar
class ProjetoDAO
{
    public function inserir($projeto)
    {
        try {
            // Insere novo projeto
            $sql = 'INSERT INTO projeto (titulo, descricao, idUsuario, arquivoCaminho)
                    VALUES (:titulo, :descricao, :idUsuario, :arquivoCaminho)';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':titulo', $projeto->getTitulo());
            $consulta->bindValue(':descricao', $projeto->getDescricao());
            $consulta->bindValue(':idUsuario', $projeto->getIdUsuario());
            $consulta->bindValue(':arquivoCaminho', $projeto->getArquivoCaminho());
            $consulta->execute();
            $projeto->setId(Conexao::getConexao()->lastInsertId());
            return true;
        } catch (Exception $e) {
            echo "Erro ao inserir projeto: " . $e->getMessage();
            return false;
        }
    }
    public function atualizar($projeto)
    {
        try {
            $sql = 'UPDATE projeto SET 
                titulo=:titulo,
                descricao = :descricao,
                idUsuario = :idUsuario,
                arquivoCaminho = :arquivoCaminho
            WHERE id=:id';  
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':titulo', $projeto->getTitulo());
            $consulta->bindValue(':descricao', $projeto->getDescricao());
            $consulta->bindValue(':idUsuario', $projeto->getIdUsuario());
            $consulta->bindValue(':arquivoCaminho', $projeto->getArquivoCaminho());
            $consulta->bindValue(':id', $projeto->getId());
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            print "Erro ao atualizar projeto <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }
    public function listarTodos()
    {

        try {
            $sql = 'SELECT * FROM projeto';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar Projetos <br>" . $e . '<br>';
        }
    }
    public function listar($usuario)
    {
        try {
            $sql = 'SELECT * FROM projeto WHERE idUsuario = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':id', $usuario->getId());
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar Projetos <br>" . $e . '<br>';
        }
    }
}
