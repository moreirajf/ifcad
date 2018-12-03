<?php
    class professorDAO{   
        public function insert(Professor $prof): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT (NOME,EMAIL,IDENDERECO,TELEFONE,COORDENADOR,IDDEPARTAMENTO,USUARIO,SENHA,ADMINISTRADOR) INTO PROFESSOR VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($prof->getNome(),
                                $prof->getEmail(),
                                $prof->getEndereco()->getIdendereco(),
                                $prof->getTelefone(),
                                $prof->getCoordenador(),
                                $prof->getDepartamento()->getId(),
                                $prof->getUsuario(),
                                $prof->getPassword(),
                                $prof->getAdministrador()
                            ));

            $id=$connection->lastInsertId();
            $connection->close();
            return $id;
        }


        public function getById($id):Professor{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM PROFESSOR WHERE IDPROFESSOR=?");
            $stmt->execute([$id]); 
            $row = $stmt->fetch();
                $professor=Professor();
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
                $professor=Professor();
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
                $professores->push($professor);
            }
            return $professores;
        }


        public function tryLogin($usuario,$senha):Professor{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM PROFESSOR WHERE USUARIO LIKE ? AND SENHA LIKE ?");
            $stmt->execute([$usuario,$senha]); 
            $row = $stmt->fetch();
            
            if(!empty($row)){
                $professor=Professor();
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
            else return false;
        }
    }
?>