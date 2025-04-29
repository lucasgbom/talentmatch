<?php
class Projeto {
    // Atributos
    private $id;
    private $arquivoCaminho;
    private $descricao;
    private $idArtista;
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

    public function getIdArtista() {
        return $this->idArtista;
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

    public function setIdArtista($idArtista) {
        $this->idArtista = $idArtista;
    }
}
