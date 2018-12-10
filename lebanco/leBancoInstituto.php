<?
    /**
     * endereco
     */
    $endereco = new Endereco();
    $endereco->setRua();
    $endereco->setNumero();
    $endereco->setBairro();
    $endereco->setCidade();
    $endereco->setEstado();
    $endereco->setCep();

    $envia = new EnderecoDAO();
    $idEndereco = $envia->insert($endereco);
    $endereco->setIdendereco($idEndereco); 
    
    /**
     * instituto
     */
    $instituto = new Instituto();
    $instituto->setNome();
    $instituto->setEndereco($endereco);

    $envia = new InstitutoDAO();
    $idInstituto = $envia->insert($instituto);
    $instituto->setId($idInstituto);

?>