<?php
    class InstitutoDAO{
        
        public function insert(Instituto $if): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT (NOME,IDENDERECO) INTO INSTITUTO VALUES (?,?)");
            $stmt->execute(array($if->getNome(),$if->getEndereco()->getIdendereco()));
            return $connection->lastInsertId();
        }

        public function select():array{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->query("SELECT * FROM INSTITUTO");
            $institutos=array();
            while ($row = $stmt->fetch()) {
                $instituto=Instituto();
                $instituto->setNome($row["NOME"]);
                $endereco=enderecoDAO::getById($row["IDENDERECO"]);
                $instituto->setEndereco($endereco);
                $institutos->push($instituto);
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

    }

    


?>