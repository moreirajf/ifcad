<?php
    class enderecoDAO{   
        public function insert(Endereco $endereco): int{
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("INSERT INTO ENDERECO(RUA,NUMERO,BAIRRO,CIDADE,ESTADO,CEP) VALUES (?,?,?,?,?,?)");            
            $stmt->execute(array($endereco->getRua(),
                                $endereco->getNumero(),
                                $endereco->getBairro(),
                                $endereco->getCidade(),
                                $endereco->getEstado(),
                                $endereco->getCep()
                            ));
                            $id=$connection->lastInsertId();
                            return $id;
        }

        public function update(Endereco $endereco){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("UPDATE ENDERECO SET RUA=?,NUMERO=?,BAIRRO=?,CIDADE=?,ESTADO=?,CEP=? WHERE IDENDERECO=?");
            $stmt->execute(array($endereco->getRua(),
                                $endereco->getNumero(),
                                $endereco->getBairro(),
                                $endereco->getCidade(),
                                $endereco->getEstado(),
                                $endereco->getCep(),
                                $endereco->getIdendereco()
                            ));
        }
        

        public function delete(Endereco $endereco){
            $connection=ConnectionFactory::getConnection();
            $stmt=$connection->prepare("DELETE FROM ENDERECO WHERE IDENDERECO=?");
            $stmt->execute(array($endereco->getIdendereco()));
        }



        public static function getById($id): Endereco{
            $connection=ConnectionFactory::getConnection();
            $stmt = $connection->prepare("SELECT * FROM ENDERECO WHERE IDENDERECO=?"); 
            $stmt->execute([$id]); 
            $end = $stmt->fetch();
            $endereco=new Endereco();
            $endereco->setRua($end["RUA"]);
            $endereco->setNumero($end["NUMERO"]);
            $endereco->setBairro($end["BAIRRO"]);
            $endereco->setCidade($end["CIDADE"]);
            $endereco->setEstado($end["ESTADO"]);
            $endereco->setCep($end["CEP"]);
            $endereco->setIdendereco($end["IDENDERECO"]);
            return $endereco;

        }
    }
?>