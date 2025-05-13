<?php

class Post
{
    private $id;
    private $dataInicio;
    private $dataFim;
    private $requisitos;
    private $cache;
    private $descricao;
    private $idUsuario;
    private $idHabilidade;
    private $titulo;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    public function getDataFim()
    {
        return $this->dataFim;
    }

    public function getRequisitos()
    {
        return $this->requisitos;
    }

    public function getCache()
    {
        return $this->cache;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getIdHabilidade()
    {
        return $this->idHabilidade;
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

    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    }

    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;
    }

    public function setRequisitos($requisitos)
    {
        $this->requisitos = $requisitos;
    }

    public function setCache($cache)
    {
        $this->cache = $cache;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setIdHabilidade($idHabilidade)
    {
        $this->idHabilidade = $idHabilidade;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
}
