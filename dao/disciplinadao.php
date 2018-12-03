<?php
    class DisciplinaDAO{
        
        public function insert(Disciplina $disc): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT INTO INSTITUTO (NOME,DESCRICAO, CARGAHORARIA,HORARIO,SALA,IDPROFESSOR,IDCURSO) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($disc->getNome(),
                        $disc->getDescricao(),
                        $disc->getCargahoraria(),
                        $disc->getHorario(),
                        $disc->getSala(),
                        $disc->getProfessor()->getId(),
                        $disc->getCurso()->getId()));
                    $id=$connection->lastInsertId();
                    $connection->close();
                    return $id;
        }

        public function select():array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM DISCIPLINA");
            $disciplinas=array();
            while ($row = $stmt->fetch()) {
                $disciplina=Disciplina();
                $disciplina->setNome($row["NOME"]);
                $disciplina->setDescricao($row["DESCRICAO"]);
                $disciplina->setCargaHoraria($row["CARGAHORARIA"]); 
                $disciplina->setHorario($row["HORARIO"]); 
                $disciplina->setSala($row["SALA"]); 
                $professor=professorDAO::getById($row["IDPROFESSOR"]);
                //FALTA PEGAR CURSO


                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $instituto->setEndereco($endereco);
                $institutos->push($instituto);
            }
            return $instituto;
        }

        public function selectByProfessor(Professor $prof):array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM DISCIPLINA WHERE IDPROFESSOR=?");

            $stmt->execute([$prof->getId()]);
            $disciplinas=array();
            while ($row = $stmt->fetch()) {
                $disciplina=Disciplina();
                $disciplina->setNome($row["NOME"]);
                $disciplina->setDescricao($row["DESCRICAO"]);
                $disciplina->setCargaHoraria($row["CARGAHORARIA"]); 
                $disciplina->setHorario($row["HORARIO"]); 
                $disciplina->setSala($row["SALA"]); 
                //FALTA PEGAR CURSO
                $disciplina->setProfessor($prof);
                $disciplinas->push($disciplina);
            }
            return $disciplinas;
        }

        public function selectByCurso(Curso $curso):array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM DISCIPLINA WHERE IDCURSO=?");
            $stmt->execute([$curso->getId()]);
            $disciplinas=array();
            while ($row = $stmt->fetch()) {
                $disciplina=Disciplina();
                $disciplina->setNome($row["NOME"]);
                $disciplina->setDescricao($row["DESCRICAO"]);
                $disciplina->setCargaHoraria($row["CARGAHORARIA"]); 
                $disciplina->setHorario($row["HORARIO"]); 
                $disciplina->setSala($row["SALA"]); 
                $professor=professorDAO::getById($row["IDPROFESSOR"]);
                $disciplina->setProfessor($professor);
                $disciplina->setCurso($curso);
                $disciplinas->push($disciplina);
            }
            return $disciplinas;
        }

        public function update(Disciplina $disc){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("UPDATE DISCIPLINA SET NOME=?,DESCRICAO=?, CARGAHORARIA=?,HORARIO=?,SALA=?,IDPROFESSOR=?,IDCURSO=? WHERE IDDISCIPLINA=?");
            $stmt->execute(array($disc->getNome(),
                        $disc->getDescricao(),
                        $disc->getCargahoraria(),
                        $disc->getHorario(),
                        $disc->getSala(),
                        $disc->getProfessor()->getId(),
                        $disc->getCurso()->getId(),
                        $disc->getId()
                    ));
        }

        public function delete(Disciplina $disc){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("DELETE FROM DISCIPLINA WHERE IDDISCIPLINA=?");
            $stmt->execute(array($disc->getId()));
        }

    }

?>