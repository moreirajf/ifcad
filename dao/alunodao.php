<?php
    class alunoDAO{   
        
        public function insert(Aluno $aluno): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT INTO ALUNO VALUES (null,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->execute(array($aluno->getMatricula(),
                                $aluno->getNome(),
                                $aluno->getEmail(),
                                $aluno->getEndereco()->getIdendereco(),
                                $aluno->getTelefone(),
                                $aluno->getBolsista(),
                                $aluno->getAnoinicio(),
                                $aluno->getCurso()->getId(),
                                $aluno->getSemestre(),
                                $aluno->getUsuario(),
                                $aluno->getPassword()
                            ));
            $id=$connection->lastInsertId();
            return $id;
        }
        


        public function update(Aluno $aluno){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("UPDATE ALUNO SET MATRICULA=?,NOME=?,EMAIL=?,TELEFONE=?,BOLSISTA=?,ANOINICIO=?,IDCURSO=?,SEMESTRE=?,USUARIO=?,SENHA=? WHERE IDALUNO=?");

            $stmt->execute(array($aluno->getMatricula(),
                                $aluno->getNome(),
                                $aluno->getEmail(),
                                $aluno->getTelefone(),
                                $aluno->getBolsista(),
                                $aluno->getAnoinicio(),
                                $aluno->getCurso()->getId(),
                                $aluno->getSemestre(),
                                $aluno->getUsuario(),
                                $aluno->getPassword(),
                                $aluno->getId()
                            ));
                            $stmt->debugDumpParams();
        
        }



        public function delete(Aluno $endereco){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("DELETE FROM ALUNO WHERE IDALUNO=?");
            $stmt->execute(array($endereco->getId()));
        }


        public static function getById($id):Aluno{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM ALUNO WHERE IDALUNO=?");
            $stmt->execute([$id]); 
            $row = $stmt->fetch();
                $aluno=new Aluno();
                $aluno->setId($id);
                $aluno->setNome($row["NOME"]);
                $aluno->setEmail($row["EMAIL"]);
                $aluno->setTelefone($row["TELEFONE"]);
                $aluno->setBolsista($row["BOLSISTA"]);
                $aluno->setAnoinicio($row["ANOINICIO"]);
                $aluno->setUsuario($row["USUARIO"]);
                $aluno->setPassword($row["SENHA"]);
                $aluno->setMatricula($row["MATRICULA"]);
                $aluno->setSemestre($row["SEMESTRE"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $departamento=cursoDAO::getById($row["IDCURSO"]);
                $aluno->setEndereco($endereco);
                $aluno->setCurso($departamento);
                return $aluno;
        }


        public function select():array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM ALUNO");
            $alunos=array();
            while ($row = $stmt->fetch()) {
                $aluno=new Aluno();
                $aluno->setId($row["IDALUNO"]);
                $aluno->setNome($row["NOME"]);
                $aluno->setEmail($row["EMAIL"]);
                $aluno->setTelefone($row["TELEFONE"]);
                $aluno->setBolsista($row["BOLSISTA"]);
                $aluno->setAnoinicio($row["ANOINICIO"]);
                $aluno->setUsuario($row["USUARIO"]);
                $aluno->setPassword($row["SENHA"]);
                $aluno->setMatricula($row["MATRICULA"]);
                $aluno->setSemestre($row["SEMESTRE"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $departamento=cursoDAO::getById($row["IDCURSO"]);
                $aluno->setEndereco($endereco);
                $aluno->setCurso($departamento);
                array_push($alunos,$aluno);
            }
            return $alunos;
        }


        public function tryLogin($usuario,$senha):Aluno{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM ALUNO WHERE USUARIO LIKE ? AND SENHA LIKE ?");
            $stmt->execute([$usuario,$senha]); 
            $row = $stmt->fetch();
            
            if(!empty($row)){
                $aluno=new Aluno();
                $aluno->setId($id);
                $aluno->setNome($row["NOME"]);
                $aluno->setEmail($row["EMAIL"]);
                $aluno->setTelefone($row["TELEFONE"]);
                $aluno->setBolsista($row["BOLSISTA"]);
                $aluno->setAnoinicio($row["ANOINICIO"]);
                $aluno->setUsuario($row["USUARIO"]);
                $aluno->setPassword($row["SENHA"]);
                $aluno->setMatricula($row["MATRICULA"]);
                $aluno->setSemestre($row["SEMESTRE"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $departamento=cursoDAO::getById($row["IDCURSO"]);
                $aluno->setEndereco($endereco);
                $aluno->setCurso($departamento);
                return $aluno;
            }
            else return false;
        }
    }
?>