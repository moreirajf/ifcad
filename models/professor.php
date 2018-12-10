<?php
    class Professor{
        private $id;
        private $nome;
        private $endereco;
        private $telefone;
        private $coordenador;
        private $administrador;
        private $usuario;
        private $password;
        private $email;
        private $departamento;


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of endereco
         */ 
        public function getEndereco():Endereco
        {
                return $this->endereco;
        }

        /**
         * Set the value of endereco
         *
         * @return  self
         */ 
        public function setEndereco(Endereco $endereco)
        {
                $this->endereco = $endereco;

                return $this;
        }

        /**
         * Get the value of telefone
         */ 
        public function getTelefone()
        {
                return $this->telefone;
        }

        /**
         * Set the value of telefone
         *
         * @return  self
         */ 
        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        /**
         * Get the value of coordenador
         */ 
        public function getCoordenador()
        {
                return $this->coordenador;
        }

        /**
         * Set the value of coordenador
         *
         * @return  self
         */ 
        public function setCoordenador($coordenador)
        {
                $this->coordenador = $coordenador;

                return $this;
        }

        /**
         * Get the value of administrador
         */ 
        public function getAdministrador()
        {
                return $this->administrador;
        }

        /**
         * Set the value of administrador
         *
         * @return  self
         */ 
        public function setAdministrador($administrador)
        {
                $this->administrador = $administrador;

                return $this;
        }

        /**
         * Get the value of usuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */ 
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of departamento
         */ 
        public function getDepartamento():Departamento
        {
                return $this->departamento;
        }

        /**
         * Set the value of departamento
         *
         * @return  self
         */ 
        public function setDepartamento(Departamento $departamento)
        {
                $this->departamento = $departamento;

                return $this;
        }
    }
?>




