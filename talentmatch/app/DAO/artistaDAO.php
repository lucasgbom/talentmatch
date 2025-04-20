<?php

/* @Autor: Adaptado por ChatGPT
   Classe DAO para Artista */

class ArtistaDAO
{
    public function carregar($id)
    {
        try {
            $sql = 'SELECT * FROM artista WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":id", $id);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao carregar Artista <br>" . $e . '<br>';
        }
    }

    public function inserir(Artista $artista)
    {
        try {
            $sql = 'INSERT INTO artista (
                        biografia, senha, nome, foto_perfil, endereco, disponivel, x, instagram, spotify, email
                    ) VALUES (
                        :biografia, :senha, :nome, :foto_perfil, :endereco, :disponivel, :x, :instagram, :spotify, :email
                    )';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':biografia', $artista->getBiografia());
            $consulta->bindValue(':senha', $artista->getSenha());
            $consulta->bindValue(':nome', $artista->getNome());
            $consulta->bindValue(':foto_perfil', $artista->getFotoPerfil());
            $consulta->bindValue(':endereco', $artista->getEndereco());
            $consulta->bindValue(':disponivel', $artista->getDisponivel(), PDO::PARAM_BOOL);
            $consulta->bindValue(':x', $artista->getX());
            $consulta->bindValue(':instagram', $artista->getInstagram());
            $consulta->bindValue(':spotify', $artista->getSpotify());
            $consulta->bindValue(':email', $artista->getEmail());
            $consulta->execute();

            header("location:../View/login.php");
            return true;
        } catch (Exception $e) {
            print "Erro ao inserir Artista <br>" . $e . '<br>';
            return false;
        }
    }


    public function logar(Artista $artista)
    {
        try {
            $sql = 'SELECT * FROM artista WHERE senha = :senha AND email = :email';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":senha", $artista->getSenha());
            $consulta->bindValue(":email", $artista->getEmail());
            $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                session_start();
                foreach ($usuario as $key => $value) {
                    $_SESSION[$key] = $value;
            }
              header("location:../View/perfil.php");
            } 
            return true;
        } catch (Exception $e) {
            print "Erro ao logar <br>" . $e . '<br>';
            return false;
        }
    }

    public function listarTodos()
    {
        try {
            $sql = 'SELECT * FROM artista';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar Artistas <br>" . $e . '<br>';
        }
    }

    public function buscar($coluna, $valor)
    {
        try {
            $sql = "SELECT * FROM artista WHERE $coluna LIKE :valor";
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":valor", "%$valor%");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao buscar Artista <br>" . $e . '<br>';
        }
    }

    public function deletar(Artista $artista)
    {
        try {
            $sql = 'DELETE FROM artista WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":id", $artista->getId());
            $consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar Artista <br>" . $e . '<br>';
        }
    }

    
    public function atualizar(Artista $artista)
    {
        try {
            $sql = 'UPDATE artista SET 
                        biografia = :biografia, 
                        senha = :senha, 
                        nome = :nome, 
                        foto_perfil = :foto_perfil, 
                        endereco = :endereco,
                        disponivel = :disponivel,
                        x = :x,
                        instagram = :instagram,
                        spotify = :spotify,
                        email = :email
                        
                    WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(':biografia', $artista->getBiografia());
            $consulta->bindValue(':senha', $artista->getSenha());
            $consulta->bindValue(':nome', $artista->getNome());
            $consulta->bindValue(':foto_perfil', $artista->getFotoPerfil());
            $consulta->bindValue(':endereco', $artista->getEndereco());
            $consulta->bindValue(':disponivel', $artista->getDisponivel(), PDO::PARAM_BOOL);
            $consulta->bindValue(':x', $artista->getX());
            $consulta->bindValue(':instagram', $artista->getInstagram());
            $consulta->bindValue(':spotify', $artista->getSpotify());
            $consulta->bindValue(':email', $artista->getEmail());
            $consulta->bindValue(':id', $artista->getId());
            $consulta->execute();

            return true;
        } catch (Exception $e) {
            print "Erro ao atualizar Artista <br>" . $e . '<br>';

            return false;
        }
    }
}
