<?php
// Editar
class ProjetoDAO
{
    public function inserir($projeto)
    {
        try {
            // Define limite máximo de projetos por artista
            $LIMITE_PROJETOS = 3;
    
            // Verifica quantos projetos o artista já possui
            $sql = 'SELECT COUNT(*) FROM projeto WHERE idArtista = :idArtista';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':idArtista', $projeto->getIdArtista());
            $consulta->execute();
            $totalProjetos = (int)$consulta->fetchColumn();
    
            if ($totalProjetos >= $LIMITE_PROJETOS) {
                echo "Limite de $LIMITE_PROJETOS projetos atingido.";
                return false;
            }
    
            // Insere novo projeto
            $sql = 'INSERT INTO projeto (titulo, descricao, idArtista, arquivoCaminho)
                    VALUES (:titulo, :descricao, :idArtista, :arquivoCaminho)';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':titulo', $projeto->getTitulo());
            $consulta->bindValue(':descricao', $projeto->getDescricao());
            $consulta->bindValue(':idArtista', $projeto->getIdArtista());
            $consulta->bindValue(':arquivoCaminho', $projeto->getArquivoCaminho());
            $consulta->execute();
    
            // Seta ID recém-inserido no objeto
            $projeto->setId(Conexao::getConexao()->lastInsertId());
    
            // Adiciona na sessão, se estiver ativa
            if (session_status() === PHP_SESSION_ACTIVE) {
               
                $_SESSION["projetos"][] = $projeto;
            }
    
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
