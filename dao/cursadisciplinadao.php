<?php
class cursaDisciplinaDAO{   
    public function insert($aluno,$disciplina): int{
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("INSERT INTO CURSA_DISCIPLINA (IDALUNO,IDDISCIPLINA,PROVA_1,PROVA_2,TABALHO,LISTA) VALUES (?,?,0,0,0,0)");
        $stmt->execute(array($aluno,
                            $disciplina));
        $stmt->debugDumpParams();
        $id=$connection->lastInsertId();
        return $id;    
    }

    public function update($iddisciplina,$idaluno,$p1,$p2,$trab,$lista){
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("UPDATE CURSA_DISCIPLINA SET PROVA_1=?,PROVA_2=?,TABALHO=?,LISTA=? WHERE IDDISCIPLINA=? AND IDALUNO=?");
        $stmt->execute(array($p1,$p2,$trab,$lista,$iddisciplina,$idaluno));
    }




    public function delete(Curso $curso){
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("DELETE FROM CURSO WHERE IDCURSO=?");
        $stmt->execute(array($curso->getId()));
    }



    public static function getById($id): Curso{
        $connection=ConnectionFactory::getConnection();
        $stmt = $connection->prepare("SELECT * FROM CURSO WHERE IDCURSO=?");
        $stmt->execute([$id]); 
        $row = $stmt->fetch();
        $curso=new Curso();
        $curso->setNome($row["NOME"]);
        $curso->setArea($row["AREA"]);
        $curso->setVagas($row["VAGAS"]);
        $curso->setId($id);
        return $curso;
    }



    public function selectByAluno($idaluno):array{
        $connection=ConnectionFactory::getConnection();
        $stmt = $connection->prepare("SELECT * FROM CURSA_DISCIPLINA WHERE IDALUNO=?");
        $stmt->execute(array($idaluno));
        $cursos=array();
        while ($row = $stmt->fetch()) {
            array_push($cursos,$row);
        }
        return $cursos;
    }

    public function selectByDisciplina($iddisciplina):array{
        $connection=ConnectionFactory::getConnection();
        $stmt = $connection->prepare("SELECT * FROM CURSA_DISCIPLINA WHERE IDDISCIPLINA=?");
        $stmt->execute(array($iddisciplina));
        $cursos=array();
        while ($row = $stmt->fetch()) {
            array_push($cursos,$row);
        }
        return $cursos;
    }


}


?>