<?php


class Conexao {
   
   public static $instance;

   private function __construct() {
       //
   }

   public static function getConexao() {
       if (!isset(self::$instance)) {
    			$servidor = "localhost";
    			$usuario = "root";
    			$senha = "";
    			$nomeDoBanco = "talentmatch";
          self::$instance = new PDO("mysql:dbname=$nomeDoBanco; host=$servidor", $usuario, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
          self::$instance->exec("SET CHARACTER SET utf8");
       }

       return self::$instance;
   }

}
