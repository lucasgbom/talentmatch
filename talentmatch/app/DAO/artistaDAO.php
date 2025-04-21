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
            
            $usuario =  $consulta->fetch(PDO::FETCH_ASSOC);

            foreach ($usuario as $key => $value) {
                $_SESSION[$key] = $value;
            }

        } catch (Exception $e) {
            print "Erro ao carregar Artista <br>" . $e . '<br>';
        }
    }

    public function inserir(Artista $artista)
    {
        try {
            

            foreach ($_POST as $campo => $valor) {
                $method  = "set". ucfirst($campo);
                if(method_exists($artista, $method)){
            
                if (!empty($valor)) {     
                    $artista->$method($valor);
                }else{
                    $artista->$method(null);
                }
            }
            }

            $metodos = get_class_methods($artista);

            $dados = [];

            foreach ($metodos as $metodo) {
                if (str_starts_with($metodo, 'get')) {
                    $campo = lcfirst(substr($metodo, 3)); // getNome → nome
                    $dados[$campo] = $artista->$metodo();
                }
            }
            
            $campos = implode(', ', array_keys($dados));
            $placeholders = ':' . implode(', :', array_keys($dados));

            $sql = "INSERT INTO artista ($campos) VALUES ($placeholders)";
            $conexao = Conexao::getConexao();
            $consulta = $conexao->prepare($sql);

            
foreach ($dados as $campo => $valor) {
    $consulta->bindValue(":$campo", $valor);
}
            
            $consulta->execute();
            
            return true;
        } catch (Exception $e) {
            print "Erro ao inserir Artista <br>" . $e . '<br>';
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
        
                foreach ($usuario as $campo => $valor) {
                    $method = "set" . ucfirst($campo);
                    if (method_exists($artista, $method)) {
                        $artista->$method($valor);
                    }
                }

                $_SESSION["usuario"] = $artista;
 
                
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
    public function artistaExiste($email)
    {
        try {
            $sql = "SELECT * FROM artista WHERE email = :email";
            $consulta = Conexao::getConexao()->prepare($sql);
            $consulta->bindValue(":email", $email);
            $consulta->execute();
            if ($consulta->fetchAll(PDO::FETCH_ASSOC)) {
                return true;
            }
            return false;
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
        $set = [];

        // Preenche o objeto com os dados do POST
        foreach ($_POST as $campo => $valor) {
            $method = "set" . ucfirst($campo);
            if (method_exists($artista, $method)) {
                // Define valor ou null no objeto
                $artista->$method(!empty($valor) ? $valor : null);
        
                // SEMPRE adiciona no SET, mesmo que valor seja null
                $set[] = "$campo = :$campo";
            }
        }
        
        // Extrai os dados do objeto com os getters
        $metodos = get_class_methods($artista);
        $dados = [];

        foreach ($metodos as $metodo) {
            if (str_starts_with($metodo, 'get')) {
                $campo = lcfirst(substr($metodo, 3));
                $dados[$campo] = $artista->$metodo();
            }
        }

        $setString = implode(', ', $set);
        $sql = "UPDATE artista SET $setString WHERE id = :id";

        $conexao = Conexao::getConexao();
        $consulta = $conexao->prepare($sql);

        // Faz o bind para os campos atualizados
        foreach ($dados as $campo => $valor) {
            if (in_array("$campo = :$campo", $set)) {
                
                $consulta->bindValue(":$campo", $valor);
            }
        }

        var_dump($setString);
        
        // Bind do ID (sempre obrigatório)
        $consulta->bindValue(':id', $artista->getId());

        $consulta->execute();

        return true;
    } catch (Exception $e) {
        print "Erro ao atualizar Artista <br>" . $e->getMessage() . '<br>';
        return false;
    }
}

}
