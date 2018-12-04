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
     * aluno
     */
    $aluno = new Alunos();
    $aluno->setNome($_POST["nome"]);
    $aluno->setMatricula($_POST["matricula"]);
    $aluno->setEndereco($endereco);
    $aluno->setTelefone($_POST["telefone"]);
    $aluno->setAnoinicio($_POST["anoinic"]);
    $aluno->setCurso($_POST["select-curse"]);
    $aluno->setSemestre($_POST["select-semestre"]);
    $aluno->setBolsista($_POST["bolsista"]);
    $aluno->setUsuario($_POST["usuario"]);
    $aluno->setPassword($_POST["senha"]);
    
    $envia = new AlunosDAO();
    $idAluno = $envia->insert($aluno);
    $aluno->setId($idAluno);
    
?>