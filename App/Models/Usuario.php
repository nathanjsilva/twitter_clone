<?php
    namespace App\Models;

    use MF\Model\Model;
use PDOException;

class Usuario extends Model {
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __get($atributo)
        {
            return $this -> $atributo;
        }

        public function __set($atributo, $valor)
        {
            $this-> $atributo = $valor;
        }

        public function inserirUsuario() {
            try{

                $sql = "INSERT INTO usuarios(nome,email,senha) VALUES (:NOME, :EMAIL, :SENHA)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':NOME',  $this->__get('nome'));
                $stmt->bindValue(':EMAIL', $this->__get('email'));
                $stmt->bindValue(':SENHA', $this->__get('senha'));
                $stmt->execute();

                return $this;

            }catch(\PDOException $e){
                return false;
            }
        }

        public function validarCadastro() {
            $valido = true;
            
            if(strlen($this->__get('nome'))  < 3) $valido = false;  
            if(strlen($this->__get('email')) < 3) $valido = false;  
            if(strlen($this->__get('senha')) < 3) $valido = false;  

            return $valido;
        }
    }
?>