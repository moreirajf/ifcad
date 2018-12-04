<?
    /**
     * endereco
     */


    $endereco = new Endereco();
    $endereco->setRua($_POST["rua"]);
    $endereco->setNumero($_POST["numero"]);
    $endereco->setBairro($_POST["bairro"]);
    $endereco->setCidade($_POST["cidade"]);
    $endereco->setEstado($_POST["estado"]);
    $endereco->setCep($_POST["cep"]);

    $envia = new EnderecoDAO();
    $idEndereco = $envia->insert($endereco);
    $endereco->setIdendereco($idEndereco);

    /**
     * professor
     */
    $professor= new Alunos();
    $professor->setNome($_POST["nome"]);
    $professor->setEndereco($endereco);
    $professor->setTelefone($_POST["telefone"]);
    $professor->setCoordenador($_POST["coordenador"]);
    $professor->setAdministrador($_POST["administrador"]);
    $professor->setUsuario($_POST["usuario"]);
    $professor->setPassword($_POST["senha"]);
    
    $envia = new ProfessorDAO();
    $idProfessor = $envia->insert($professor);
    $professor->setId($idProfessor);
    
?>