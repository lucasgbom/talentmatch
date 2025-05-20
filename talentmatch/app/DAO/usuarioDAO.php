<?php

class UsuarioDAO
{
    public function carregar($id)
    {
        try {
            $sql = 'SELECT * FROM usuario WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":id", $id);
            $consulta->execute();

            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            foreach ($usuario as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } catch (Exception $e) {
            print "Erro ao carregar usuario <br>" . $e->getMessage() . '<br>';
        }
    }

    public function inserir($email, $senha, $nome)
    {
        try {
            $sql = "INSERT INTO usuario (email, senha, nome) VALUES (:email, :senha, :nome)";
            $conexao = Conexao::getConexao();
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(":email", $email);
            $consulta->bindValue(":senha", $senha);
            $consulta->bindValue(":nome", $nome);
            $consulta->execute();

            return true;
        } catch (Exception $e) {
            print "Erro ao inserir usuario <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }

    public function logar($email, $senha)
    {
        try {
            $sql = 'SELECT * FROM usuario WHERE email = :email AND senha = :senha';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":email", $email);
            $consulta->bindValue(":senha", $senha);
            $consulta->execute();

            $dados = $consulta->fetch(PDO::FETCH_ASSOC);
            if ($dados) {
                $usuario = new Usuario();
                foreach ($dados as $campo => $valor) {
                    $method = "set" . ucfirst($campo);
                    if (method_exists($usuario, $method)) {
                        $usuario->$method($valor);
                    }
                }
                $_SESSION["usuario"] = $usuario;
                $_SESSION['nome'] = $usuario->getNome();
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
            $sql = 'SELECT * FROM usuario';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print "Erro ao listar usuarios <br>" . $e->getMessage() . '<br>';
        }
    }

    public function buscar($coluna, $valor)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE $coluna LIKE :valor";
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":valor", "%$valor%");
            $consulta->execute();
            if ($coluna == "id"){
                return $consulta->fetch(PDO::FETCH_ASSOC);
            }
            else{
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception $e) {
            print "Erro ao buscar usuario <br>" . $e->getMessage() . '<br>';
        }
    }

    public function usuarioExiste($email)
    {
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":email", $email);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC) ? true : false;
        } catch (Exception $e) {
            print "Erro ao verificar existência do usuario <br>" . $e->getMessage() . '<br>';
        }
    }

    public function deletar(Usuario $usuario)
    {
        try {
            $sql = 'DELETE FROM usuario WHERE id = :id';
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":id", $usuario->getId());
            $consulta->execute();
        } catch (Exception $e) {
            print "Erro ao deletar usuario <br>" . $e->getMessage() . '<br>';
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {
            foreach ($_FILES as $campo => $arquivo) {
                if (!empty($arquivo['name'])) {
                    $info = pathinfo($arquivo['name']);
                    $filename = $info['filename'];
                    $extension = $info['extension'];

                    $cript = md5($filename . time());
                    $encrypt = $cript . '.' . $extension;

                    $fileTmpPath = $arquivo['tmp_name'];
                    $targetpath = "../../data/" . $encrypt;

                    if (move_uploaded_file($fileTmpPath, $targetpath)) {
                        echo "Arquivo enviado com sucesso: $encrypt";
                        // Deleta a foto antiga, se houver
                        $fotoAntiga = $usuario->getFotoPerfil();
                        if (isset($fotoAntiga)) {
                            $caminhoAntigo = "../../data/$fotoAntiga";
                            if (file_exists($caminhoAntigo)) {
                                unlink($caminhoAntigo);
                            }
                        }
                        $usuario->setFotoPerfil($encrypt);
                    } else {
                        echo "Erro ao mover o arquivo.";
                    }
                }
            }

            $set = [];

            // Monta os campos SET dinamicamente
            $metodos = get_class_methods($usuario);
            foreach ($metodos as $metodo) {
                if (str_starts_with($metodo, 'get')) {
                    $campo = lcfirst(substr($metodo, 3));
                    $set[] = "$campo = :$campo";
                }
            }

            $setString = implode(', ', $set);
            $sql = "UPDATE usuario SET $setString WHERE id = :id";

            $conexao = Conexao::getConexao();
            $consulta = $conexao->prepare($sql);

            // Bind dos valores
            foreach ($metodos as $metodo) {
                if (str_starts_with($metodo, 'get')) {
                    $campo = lcfirst(substr($metodo, 3));
                    $valor = $usuario->$metodo();
                    $consulta->bindValue(":$campo", $valor);
                }
            }
            var_dump($setString);
            $consulta->execute();
            $_SESSION['usuario'] = $usuario;
            return true;
        } catch (Exception $e) {
            print "Erro ao atualizar usuario <br>" . $e->getMessage() . '<br>';
            return false;
        }
    }
}
