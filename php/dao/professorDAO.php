<?php
    class professorDAO{   
        public function insert(Professor $prof): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT (NOME,EMAIL,IDENDERECO,TELEFONE,COORDENADOR,IDDEPARTAMENTO,USUARIO,SENHA,ADMINISTRADOR) INTO ENDERECO VALUES (?,?,?,?,?,?,?,?,?)");
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
            return $connection->lastInsertId();
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
    }
?>