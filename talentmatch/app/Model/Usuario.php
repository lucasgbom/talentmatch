<?php
class Usuario {
    private $id;
    private $biografia;
    private $senha;
    private $nome;
    private $nome_usuario;
    private $foto_perfil;
    private $endereco;
    private $latitude;
    private $longitude;
    private $email;

    public function getId() {
        return $this->id;
    }
      public function getLatitude(){
        return $this->latitude;
    }
    public function getLongitude(){
        return $this->longitude;
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
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setNomeUsuario($nome_usuario) {
        $this->nome_usuario = $nome_usuario;
    }
     public function setLatitude($lat){
        $this->latitude = $lat;
    }
    public function setLongitude($lon){
        $this->longitude = $lon;
    }
}
