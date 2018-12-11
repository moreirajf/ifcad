<?php

class departamentoDAO{   
        
    public function insert(Departamento $dep): int{
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("INSERT INTO DEPARTAMENTO(NOME,TELEFONE,IDINSTITUTO) VALUES (?,?,?)");

        $stmt->execute(array($dep->getNome(),
                            $dep->getTelefone(),
                            $dep->getInstituto()->getId()
                        ));

        $id=$connection->lastInsertId();
        return $id;
    }



    public function update(Departamento $dep){
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("UPDATE DEPARTAMENTO SET NOME=?,TELEFONE=?,IDINSTITUTO=? WHERE IDDEPARTAMENTO=?");

        $stmt->execute(array($dep->getNome(),
                            $dep->getTelefone(),
                            $dep->getInstituto()->getId(),$dep->getId()
                        ));

    }

    public function delete(Departamento $dep){
        $connection=ConnectionFactory::getConnection();
        $stmt=$connection->prepare("DELETE FROM DEPARTAMENTO WHERE IDDEPARTAMENTO=?");

        $stmt->execute(array($dep->getId()
                        ));
    }




    public static function getById($id):Departamento{
        $connection=ConnectionFactory::getConnection();
        $stmt = $connection->prepare("SELECT * FROM DEPARTAMENTO WHERE IDDEPARTAMENTO=?");
        $stmt->execute([$id]); 
        $row = $stmt->fetch();
            $dep=new Departamento();
            $dep->setId(intval($id));
            $dep->setNome($row["NOME"]);
            $dep->setTelefone($row["TELEFONE"]);
            $instituto=InstitutoDAO::getById($row["IDINSTITUTO"]);
            $dep->setInstituto($instituto);
            return $dep;
    }


    public function select():array{
        $connection=ConnectionFactory::getConnection();
        $stmt = $connection->query("SELECT * FROM DEPARTAMENTO");
        $deps=array();
        while ($row = $stmt->fetch()) {
            $dep=new Departamento();
            $dep->setNome($row["NOME"]);
            $dep->setTelefone($row["TELEFONE"]);
            $dep->setId($row["IDDEPARTAMENTO"]);
            $instituto=InstitutoDAO::getById(intval($row["IDINSTITUTO"]));
            $dep->setInstituto($instituto);
            array_push($deps,$dep);
        }
        return $deps;
    }

}

?>