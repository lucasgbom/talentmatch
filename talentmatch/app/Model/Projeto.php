<?php
class Projeto implements JsonSerializable {
    // Atributos
    private $id;
    private $arquivoCaminho;
    private $descricao;
    private $idUsuario;
    private $titulo;
    // Getters
    public function getTitulo() {
        return $this->titulo;
    }
    public function getId() {
        return $this->id;
    }
    public function getArquivoCaminho() {
        return $this->arquivoCaminho;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    // Setters
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setArquivoCaminho($arquivoCaminho) {
        $this->arquivoCaminho = $arquivoCaminho;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'idUsuario' => $this->idUsuario,
            'arquivoCaminho' => $this->arquivoCaminho
        ];
    }
    
}
