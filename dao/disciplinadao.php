<?php
    class DisciplinaDAO{
        
        public function insert(Disciplina $disc): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT INTO DISCIPLINA (NOME,DESCRICAO, CARGAHORARIA,HORARIO,SALA,IDPROFESSOR,IDCURSO) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute(array($disc->getNome(),
                        $disc->getDescricao(),
                        $disc->getCargahoraria(),
                        $disc->getHorario(),
                        $disc->getSala(),
                        $disc->getProfessor()->getId(),
                        $disc->getCurso()->getId()));
                    $id=$connection->lastInsertId();
                    return $id;
        }

        public function select():array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM DISCIPLINA");
            $disciplinas=array();
            while ($row = $stmt->fetch()) {
                $disciplina=new Disciplina();
                $disciplina->setNome($row["NOME"]);
                $disciplina->setDescricao($row["DESCRICAO"]);
                $disciplina->setCargaHoraria($row["CARGAHORARIA"]); 
                $disciplina->setHorario($row["HORARIO"]); 
                $disciplina->setSala($row["SALA"]); 
                $professor=professorDAO::getById($row["IDPROFESSOR"]);
                $disciplina->setId($row["IDDISCIPLINA"]);
                
                $disciplina->setCurso(cursoDAO::getById($row["IDCURSO"]));
                array_push($disciplinas,$disciplina);
            }
            return $disciplinas;
        }

        public function selectByProfessor(Professor $prof):array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM DISCIPLINA WHERE IDPROFESSOR=?");

            $stmt->execute([$prof->getId()]);
            $disciplinas=array();
            while ($row = $stmt->fetch()) {
                $disciplina=new Disciplina();
                $disciplina->setNome($row["NOME"]);
                $disciplina->setDescricao($row["DESCRICAO"]);
                $disciplina->setCargaHoraria($row["CARGAHORARIA"]); 
                $date = new DateTime($row["HORARIO"]);
                $result = $date->format('H:i');
                $disciplina->setHorario($result); 
                $disciplina->setSala($row["SALA"]); 
                //FALTA PEGAR CURSO
                
                $disciplina->setCurso(cursoDAO::getById($row["IDCURSO"]));
                $disciplina->setProfessor($prof);
                array_push($disciplinas,$disciplina);
            }
            return $disciplinas;
        }

        public function selectByCurso(Curso $curso):array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM DISCIPLINA WHERE IDCURSO=?");
            $stmt->execute([$curso->getId()]);
            $disciplinas=array();
            while ($row = $stmt->fetch()) {
                $disciplina=new Disciplina();
                $disciplina->setNome($row["NOME"]);
                $disciplina->setDescricao($row["DESCRICAO"]);
                $disciplina->setCargaHoraria($row["CARGAHORARIA"]); 
                $date = new DateTime($row["HORARIO"]);
                $result = $date->format('H:i');
                $disciplina->setHorario($result);
                $disciplina->setSala($row["SALA"]); 
                $professor=professorDAO::getById($row["IDPROFESSOR"]);
                $disciplina->setProfessor($professor);
                $disciplina->setCurso($curso);
                array_push($disciplinas,$disciplina);
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