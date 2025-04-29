<?php
class ContratadorDAO
{

	public function carregar($id)
	{
		try {
			$sql = 'SELECT * FROM contratador WHERE id = :id';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id", $id);
			$consulta->execute();
			return $consulta->fetch(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			print "Erro ao carregar Contratador <br>" . $e . '<br>';
		}
	}
	public function logar($senha, $email)
	{
		try {
			$sql = 'SELECT * FROM artista WHERE senha = :senha AND email = :email';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":senha", $senha);
			$consulta->bindValue(":email", $email);
			$consulta->execute();
			$usuario = $consulta->fetch(PDO::FETCH_ASSOC);
			if ($usuario) {
				session_start();
				foreach ($usuario as $key => $value) {
					$_SESSION[$key] = $value;
				}
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			print "Erro ao logar <br>" . $e . '<br>';
			return false;
		}
	}
	public function listarTodos()
	{
		try {
			$sql = 'SELECT * FROM contratador';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			print "Erro ao listar Contratadores <br>" . $e . '<br>';
		}
	}

	public function buscar($coluna, $valor)
	{
		try {
			$sql = "SELECT * FROM contratador WHERE $coluna LIKE :valor";
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":valor", "%$valor%");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			print "Erro ao buscar Contratador <br>" . $e . '<br>';
		}
	}

	public function deletar(Contratador $contratador)
	{
		try {
			$sql = 'DELETE FROM contratador WHERE id = :id';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(":id", $contratador->getId());
			$consulta->execute();
		} catch (Exception $e) {
			print "Erro ao deletar Contratador <br>" . $e . '<br>';
		}
	}

	public function inserir(Contratador $contratador)
	{
		try {
			$sql = 'INSERT INTO contratador (nome, senha, endereco, foto, descricao, email) 
                    VALUES (:nome, :senha, :endereco, :foto, :descricao, :email)';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':nome', $contratador->getNome());
			$consulta->bindValue(':senha', $contratador->getSenha());
			$consulta->bindValue(':endereco', $contratador->getEndereco());
			$consulta->bindValue(':foto', $contratador->getFoto());
			$consulta->bindValue(':descricao', $contratador->getDescricao());
			$consulta->bindValue(':email', $contratador->getEmail());
			$consulta->execute();
		} catch (Exception $e) {
			print "Erro ao inserir Contratador <br>" . $e . '<br>';
		}
	}

	public function atualizar(Contratador $contratador)
	{
		try {
			$sql = 'UPDATE contratador SET 
                        nome = :nome, 
                        senha = :senha, 
                        endereco = :endereco, 
                        foto = :foto, 
                        descricao = :descricao,
                        email = :email 
                    WHERE id = :id';
			$consulta = Conexao::getConexao()->prepare($sql);
			$consulta->bindValue(':nome', $contratador->getNome());
			$consulta->bindValue(':senha', $contratador->getSenha());
			$consulta->bindValue(':endereco', $contratador->getEndereco());
			$consulta->bindValue(':foto', $contratador->getFoto());
			$consulta->bindValue(':descricao', $contratador->getDescricao());
			$consulta->bindValue(':email', $contratador->getEmail());
			$consulta->bindValue(':id', $contratador->getId());
			$consulta->execute();
		} catch (Exception $e) {
			print "Erro ao atualizar Contratador <br>" . $e . '<br>';
		}
	}
}
