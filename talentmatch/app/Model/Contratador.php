<?php

/* @Autor: Adaptado por ChatGPT
   Atributos e métodos da classe Contratador */

class Contratador {
    // Atributos
    private $id;
    private $nome;
    private $senha;
    private $endereco;
    private $foto;
    private $descricao;
    private $email;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
