<?php
    class InstitutoDAO{
        
        public function insert(Instituto $if): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT INTO INSTITUTO(NOME,IDENDERECO) VALUES (?,?)");
            $stmt->execute(array($if->getNome(),$if->getEndereco()->getIdendereco()));
            $id=$connection->lastInsertId();
            return $id;
        }

        public function select():array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM INSTITUTO");
            $institutos=array();
            while ($row = $stmt->fetch()) {
                $instituto=new Instituto();
                $instituto->setId($row["IDINSTITUTO"]); 
                $instituto->setNome($row["NOME"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $instituto->setEndereco($endereco);
                array_push($institutos,$instituto);
            }
            return $institutos;
        }

        public function update(Instituto $if){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("UPDATE INSTITUTO SET NOME=? WHERE IDINSTITUTO=?");
            $stmt->execute(array($if->getNome(),$if->getId()));
        }

        public function delete(Instituto $if){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("DELETE FROM INSTITUTO WHERE IDINSTITUTO=?");
            $stmt->execute(array($if->getId()));
        }



        public static function getByID($id):Instituto{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM INSTITUTO WHERE IDINSTITUTO=?");
            $stmt->execute(array($id));
            $row = $stmt->fetch();
            $instituto=new Instituto();
            $instituto->setNome($row["NOME"]);
            $endereco=enderecoDAO::getById($row["IDENDERECO"]);
            $instituto->setEndereco($endereco);
            return $instituto;
        }



    }

    


?>