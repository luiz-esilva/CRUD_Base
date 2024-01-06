<?php
    namespace App\Models;
    
    // Essa classe armazena as informações do usuário para o envio ao banco de dados
    class Usuarios {
        private $id, $usuario, $senha, $nome_usuario, $sobrenome_usuario, $data_nascimento;

        // Exibe os dados (Exemplo: para inserir no banco de dados futuramente)
        public function getId() {
            return $this->id;
        }
        
        public function getUsuario() {
            return $this->usuario;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function getNome() {
            return $this->nome_usuario;
        }

        public function getSobrenome() {
            return $this->sobrenome_usuario;
        }

        public function getNascimento() {
            return $this->data_nascimento;
        }

        // Insere os dados na variável dentro da classe Usuarios
        public function setId($id) {
            $this->id = $id;
        }
        
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function setNome($nome) {
            $this->nome_usuario = $nome;
        }

        public function setSobrenome($sobrenome) {
            $this->sobrenome_usuario = $sobrenome;
        }

        public function setNascimento($nascimento) {
            $this->data_nascimento = $nascimento;
        }
    }
?>