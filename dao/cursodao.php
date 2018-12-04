<?php
class cursoDAO{   
    public function insert(Curso $curso): int{
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("INSERT INTO CURSO (NOME,AREA,VAGAS,IDDEPARTAMENTO) VALUES (?,?,?,?)");
        $stmt->execute(array($curso->getNome(),
                            $curso->getArea(),
                            $curso->getVagas(),
                            $curso->getDepartamento()->getId()));
        $id=$connection->lastInsertId();
        return $id;    
    }

    public function update(Curso $curso){
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("UPDATE CURSO SET NOME=?,AREA=?,VAGAS=?,IDDEPARTAMENTO=? WHERE IDCURSO=?");
        $stmt->execute(array($curso->getNome(),
                            $curso->getArea(),
                            $curso->getVagas(),
                            $curso->getDepartamento()->getId(),
                            $curso->getId()));
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



    public function select():array{
        $connection=ConnectionFactory::getConnection();
        $stmt = $connection->query("SELECT * FROM CURSO");
        $cursos=array();
        while ($row = $stmt->fetch()) {
            $curso=new Curso();
            $curso->setNome($row["NOME"]);
            $curso->setArea($row["AREA"]);
            $curso->setTelefone($row["VAGAS"]);
            $curso->setId($row["IDCURSO"]);
            $departamento=departamentoDAO::getById($row["IDDEPARTAMENTO"]);
            $curso->setDepartamento($departamento);
            array_push($cursos,$curso);
        }
        return $cursos;
    }


}


?>