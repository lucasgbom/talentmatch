<?php

/* @Autor: Adaptado por ChatGPT
   Atributos e métodos da classe Artista */

class Artista {
    // Atributos
    private $id;
    private $biografia;
    private $senha;
    private $nome;
    private $nome_usuario;
    private $foto_perfil;
    private $endereco;
    private $disponivel;
    private $x;
    private $instagram;
    private $spotify;
    private $email;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getBiografia() {
        return $this->biografia;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getFotoPerfil() {
        return $this->foto_perfil;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getDisponivel() {
        return $this->disponivel;
    }

    public function getX() {
        return $this->x;
    }

    public function getInstagram() {
        return $this->instagram;
    }

    public function getSpotify() {
        return $this->spotify;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNomeUsuario() {
        return $this->nome_usuario;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setBiografia($biografia) {
        $this->biografia = $biografia;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setFotoPerfil($foto_perfil) {
        $this->foto_perfil = $foto_perfil;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setDisponivel($disponivel) {
        $this->disponivel = $disponivel;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function setInstagram($instagram) {
        $this->instagram = $instagram;
    }

    public function setSpotify($spotify) {
        $this->spotify = $spotify;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNomeUsuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }
}
