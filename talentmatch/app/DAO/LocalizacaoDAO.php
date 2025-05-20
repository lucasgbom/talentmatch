<?php
class LocalizacaoDAO
{
    public function inserir(Localizacao $localizacao)
    {
        try {
            $sql = 'INSERT INTO localizacao (latitude,longitude,idUsuario) VALUES (:lat,:lon,:idUsuario)';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':lat', $localizacao->getLat());
            $consulta->bindValue(':lon', $localizacao->getLon());
            $consulta->bindValue(':idUsuario', $localizacao->getIdUsuario());
            $consulta->execute();
            return true;
        } catch (Exception $e) {
            echo "Erro ao inserir localizacao: " . $e->getMessage();
            return false;
        }
    }
    public function listarTodos()
    {
       try {
            $sql = 'SELECT * FROM localizacao';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar localizacao <br>" . $e . '<br>';
        }
    }
}
