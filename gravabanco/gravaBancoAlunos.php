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
     * aluno
     */
    $aluno = new Alunos();
    $aluno->setNome();
    $aluno->setMatricula();
    $aluno->setEndereco($endereco);
    $aluno->setTelefone();
    $aluno->setAnoinicio();
    $aluno->setCurso();
    $aluno->setSemestre();
    $aluno->setBolsista();
    $aluno->setUsuario();
    $aluno->setPassword();
    
    $envia = new AlunosDAO();
    $idAluno = $envia->insert($aluno);
    $aluno->setId($idAluno);
    
?>