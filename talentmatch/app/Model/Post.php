<?php

class Post
{
    private $id;
    private $data;
    private $pagamento;
    private $descricao;
    private $idUsuario;
    private $habilidade;
    private $titulo;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getPagamento()
    {
        return $this->pagamento;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getHabilidade()
    {
        return $this->habilidade;
    }
     public function getTitulo()
    {
        return $this->titulo;
    }


    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setHabilidade($habilidade)
    {
        $this->habilidade = $habilidade;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
}
