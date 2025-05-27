<?php
class Post
{
    public function getNameOfClass()
   {
      return static::class;
   }
    private $id;
    private $data;
    private $pagamento;
    private $descricao;
    private $idUsuario;
    private $habilidade;
    private $latitude;
    private $longitude;
    private $titulo;

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
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
     public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }
     public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
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
