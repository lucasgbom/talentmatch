<?php

class ArtistaDAO
{
    public function carregar($id)
    {
        try {
            $sql = 'SELECT * FROM artista WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":id", $id);
            $consulta->execute();

            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            foreach ($usuario as $key => $value) {
                $_SESSION[$key] = $value;
            }

        } catch (Exception $e) {
            print "Erro ao carregar Artista <br>" . $e->getMessage() . '<br>';
        }
    }

    public function inserir(Artista $artista)
    {
        try {

            foreach ($_POST as $campo => $valor) {
                $method = "set" . ucfirst($campo);
                if (method_exists($artista, $method)) {
                    if (!empty($valor)) {
                        $artista->$method($valor);
                    }
                }
            }

            var_dump($artista);

            $sql = "INSERT INTO artista (nome, email, senha) VALUES (:nome, :email, :senha)";
            $conexao = Conexao::getConexao();
            $consulta = $conexao->prepare($sql);

            $consulta->bindValue(":nome", $artista->getNome());
            $consulta->bindValue(":email", $artista->getEmail());
            $consulta->bindValue(":senha", $artista->getSenha());

            $consulta->execute();

            return true;
        } catch (Exception $e) {
            print "Erro ao inserir Artista <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }

    public function logar(Artista $artista)
    {
        try {
            $sql = 'SELECT * FROM artista WHERE email = :email AND senha = :senha';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":email", $_POST["email"]);
            $consulta->bindValue(":senha", $_POST["senha"]);
            $consulta->execute();

            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                foreach ($usuario as $campo => $valor) {
                    $method = "set" . ucfirst($campo);
                    if (method_exists($artista, $method)) {
                        $artista->$method($valor);
                    }
                }

                $_SESSION["usuario"] = $artista;
                return true;
            }

            return false;
        } catch (Exception $e) {
            print "Erro ao logar <br>" . $e->getMessage() . '<br>';
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
            print "Erro ao listar Artistas <br>" . $e->getMessage() . '<br>';
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
            print "Erro ao buscar Artista <br>" . $e->getMessage() . '<br>';
        }
    }

    public function artistaExiste($email)
    {
        try {
            $sql = "SELECT * FROM artista WHERE email = :email";
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":email", $email);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC) ? true : false;
        } catch (Exception $e) {
            print "Erro ao verificar existência do Artista <br>" . $e->getMessage() . '<br>';
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
            print "Erro ao deletar Artista <br>" . $e->getMessage() . '<br>';
        }
    }

    public function atualizar(Artista $artista)
    {
        try {
        
            foreach ($_FILES as $campo => $arquivo) {
                if (!empty($arquivo['name'])) {
                    $info = pathinfo($arquivo['name']);
                    $filename = $info['filename'];
                    $extension = $info['extension'];
    
                    $cript = md5($filename . time()); // tempo para evitar conflitos
                    $encrypt = $cript . '.' . $extension;
    
                    $fileTmpPath = $arquivo['tmp_name'];
                    $targetpath = "../../data/" . $encrypt;
    
                    if (move_uploaded_file($fileTmpPath, $targetpath)) {
                        echo "Arquivo enviado com sucesso: $encrypt";
                        
    
                        // Deleta a foto antiga, se houver
                        $fotoAntiga = $artista->getFotoPerfil();
                        if (isset($fotoAntiga)) {
                            unlink("../../data/$fotoAntiga");
                            var_dump($fotoAntiga);
                        }
    
                        $artista->setFotoPerfil($encrypt);

                    } else {
                        echo "Erro ao mover o arquivo.";
                    }
                }
            }

            $set = [];
    
            // Monta os campos SET dinamicamente
            $metodos = get_class_methods($artista);
            foreach ($metodos as $metodo) {
                if (str_starts_with($metodo, 'get')) {
                    $campo = lcfirst(substr($metodo, 3));
                    $set[] = "$campo = :$campo";
                }
            }
    
            $setString = implode(', ', $set);
            $sql = "UPDATE artista SET $setString WHERE id = :id";
    
            $conexao = Conexao::getConexao();
            $consulta = $conexao->prepare($sql);
    
            // Bind dos valores
            foreach ($metodos as $metodo) {
                if (str_starts_with($metodo, 'get')) {
                    $campo = lcfirst(substr($metodo, 3));
                    $valor = $artista->$metodo();
                    $consulta->bindValue(":$campo", $valor);
                }
            }
    
            $consulta->execute();
            return true;
    
        } catch (Exception $e) {
            print "Erro ao atualizar Artista <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }
}    