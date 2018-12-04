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
     * professor
     */
    $professor= new Alunos();
    $professor->setNome();
    $professor->setEndereco($endereco);
    $professor->setTelefone();
    $professor->setCoordenador();
    $professor->setAdministrador();
    $professor->setUsuario();
    $professor->setPassword();
    
    $envia = new ProfessorDAO();
    $idProfessor = $envia->insert($professor);
    $professor->setId($idProfessor);
    
?>