<?php
// Editar
class ProjetoDAO
{
    public function inserir($projeto)
    {
        var_dump($projeto);
        try {
            $sql = 'INSERT INTO projeto (titulo,descricao,idArtista,arquivoCaminho) VALUES (:titulo, :descricao, :idArtista, :arquivoCaminho)';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':titulo', $projeto->getTitulo());
            $consulta->bindValue(':descricao', $projeto->getDescricao());
            $consulta->bindValue(':idArtista', $projeto->getIdArtista());
            $consulta->bindValue(':arquivoCaminho', $projeto->getArquivoCaminho());
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            print "Erro ao inserir projeto <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }
    public function atualizar($projeto)
    {
        try {
            $sql = 'UPDATE projeto SET 
                titulo=:titulo,
                descricao = :descricao,
                idArtista = :idArtista,
                arquivoCaminho = :arquivoCaminho
            WHERE id=:id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':titulo', $projeto->getTitulo());
            $consulta->bindValue(':descricao', $projeto->getDescricao());
            $consulta->bindValue(':idArtista', $projeto->getIdArtista());
            $consulta->bindValue(':arquivoCaminho', $projeto->getArquivoCaminho());
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            print "Erro ao atualizar projeto <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }
}
