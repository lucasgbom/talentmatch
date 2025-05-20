<?php 
class Localizacao {
    private $id;
    private $lat;
    private $lon;
    private $idUsuario;
    //GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getlat(){
        return $this->lat;
    }
    public function getlon(){
        return $this->lon;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    //SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setLat($lat){
        $this->lat = $lat;
    }
    public function setLon($lon){
        $this->lon = $lon;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
}