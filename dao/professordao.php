<?php
    class professorDAO{   
        public function insert(Professor $prof): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT INTO PROFESSOR (NOME,EMAIL,IDENDERECO,TELEFONE,COORDENADOR,IDDEPARTAMENTO,USUARIO,SENHA,ADMINISTRADOR) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($prof->getNome(),
                                $prof->getEmail(),
                                intval($prof->getEndereco()->getIdendereco()),
                                $prof->getTelefone(),
                                intval($prof->getCoordenador()),
                                $prof->getDepartamento()->getId(),
                                $prof->getUsuario(),
                                $prof->getPassword(),
                                intval($prof->getAdministrador())
                            ));
            $id=$connection->lastInsertId();
            return $id;
        }


        public function delete(Professor $prof){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("DELETE FROM PROFESSOR WHERE IDPROFESSOR=?");
            $stmt->execute(array($prof->getId()));
        }

        public function update(Professor $prof){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("UPDATE PROFESSOR SET NOME=?,EMAIL=?,TELEFONE=?,COORDENADOR=?,IDDEPARTAMENTO=?,USUARIO=?,SENHA=?,ADMINISTRADOR=? WHERE IDPROFESSOR=?");
            $stmt->execute(array($prof->getNome(),
                                $prof->getEmail(),
                                $prof->getTelefone(),
                                intval($prof->getCoordenador()),
                                $prof->getDepartamento()->getId(),
                                $prof->getUsuario(),
                                $prof->getPassword(),
                                intval($prof->getAdministrador()),
                                $prof->getId()
                            ));
            
        }

        public static function getById($id):Professor{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM PROFESSOR WHERE IDPROFESSOR=?");
            $stmt->execute([$id]); 
            $row = $stmt->fetch();
                $professor=new Professor();
                $professor->setNome($row["NOME"]);
                $professor->setEmail($row["EMAIL"]);
                $professor->setTelefone($row["TELEFONE"]);
                $professor->setCoordenador($row["COORDENADOR"]);
                $professor->setId($row["IDPROFESSOR"]);
                $professor->setAdministrador($row["ADMINISTRADOR"]);
                $professor->setUsuario($row["USUARIO"]);
                $professor->setPassword($row["SENHA"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $departamento=departamentoDAO::getById($row["IDDEPARTAMENTO"]);
                $professor->setEndereco($endereco);
                $professor->setDepartamento($departamento);
                return $professor;
        }


        public function select():array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM PROFESSOR");
            $professores=array();
            while ($row = $stmt->fetch()) {
                $professor=new Professor();
                $professor->setNome($row["NOME"]);
                $professor->setEmail($row["EMAIL"]);
                $professor->setTelefone($row["TELEFONE"]);
                $professor->setCoordenador($row["COORDENADOR"]);
                $professor->setId($row["IDPROFESSOR"]);
                $professor->setAdministrador($row["ADMINISTRADOR"]);
                $professor->setUsuario($row["USUARIO"]);
                $professor->setPassword($row["SENHA"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $departamento=departamentoDAO::getById($row["IDDEPARTAMENTO"]);
                $professor->setEndereco($endereco);
                $professor->setDepartamento($departamento);
                array_push($professores,$professor);
            }
            return $professores;
        }


        public function tryLogin($usuario,$senha){
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM PROFESSOR WHERE USUARIO LIKE ? AND SENHA LIKE ?");
            $stmt->execute([$usuario,$senha]); 
            $row = $stmt->fetch();
            if(!empty($row)){

                $professor=new Professor();
                $professor->setNome($row["NOME"]);
                $professor->setEmail($row["EMAIL"]);
                $professor->setTelefone($row["TELEFONE"]);
                $professor->setCoordenador($row["COORDENADOR"]);
                $professor->setId($row["IDPROFESSOR"]);
                $professor->setAdministrador($row["ADMINISTRADOR"]);
                $professor->setUsuario($row["USUARIO"]);
                $professor->setPassword($row["SENHA"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                
                $departamento=departamentoDAO::getById($row["IDDEPARTAMENTO"]);
                $professor->setEndereco($endereco);
                $professor->setDepartamento($departamento);
                
                
                
                return $professor;}
                else return null;
    
        }
    }
?>