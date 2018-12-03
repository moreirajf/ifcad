<?php
    class Aluno{
        private $id;
        private $nome;
        private $matricula;
        private $endereco;
        private $telefone;
        private $anoinicio;
        private $curso;
        private $semestre;
        private $bolsista;
        private $usuario;
        private $password;
        private $email;



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
         * Get the value of matricula
         */ 
        public function getMatricula()
        {
                return $this->matricula;
        }

        /**
         * Set the value of matricula
         *
         * @return  self
         */ 
        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

                return $this;
        }

        /**
         * Get the value of endereco
         */ 
        public function getEndereco()
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
         * Get the value of anoinicio
         */ 
        public function getAnoinicio()
        {
                return $this->anoinicio;
        }

        /**
         * Set the value of anoinicio
         *
         * @return  self
         */ 
        public function setAnoinicio($anoinicio)
        {
                $this->anoinicio = $anoinicio;

                return $this;
        }

        /**
         * Get the value of curso
         */ 
        public function getCurso()
        {
                return $this->curso;
        }

        /**
         * Set the value of curso
         *
         * @return  self
         */ 
        public function setCurso(Curso $curso)
        {
                $this->curso = $curso;

                return $this;
        }

        /**
         * Get the value of semestre
         */ 
        public function getSemestre()
        {
                return $this->semestre;
        }

        /**
         * Set the value of semestre
         *
         * @return  self
         */ 
        public function setSemestre($semestre)
        {
                $this->semestre = $semestre;

                return $this;
        }

        /**
         * Get the value of bolsista
         */ 
        public function getBolsista()
        {
                return $this->bolsista;
        }

        /**
         * Set the value of bolsista
         *
         * @return  self
         */ 
        public function setBolsista($bolsista)
        {
                $this->bolsista = $bolsista;

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
    }
    
    ?>    