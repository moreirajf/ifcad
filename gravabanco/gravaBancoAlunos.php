<?php
    /**
     * endereco
     */    require_once("../config/include.php");

    
    if(isset($_POST["action"])){
        $aluno =alunoDAO::getById($_POST["id"]);
        $end=new enderecoDAO();
        $end->delete($aluno->getEndereco());
        $envia = new AlunoDAO();
        $envia->delete($aluno);
    }
    else{
    
    
    

    /**
     * aluno
     */
    $aluno = new Aluno();
    $aluno->setNome($_POST["nome"]);
    $aluno->setMatricula($_POST["matricula"]);
    $aluno->setTelefone($_POST["telefone"]);
    $aluno->setAnoinicio($_POST["anoinic"]);
    
    $aluno->setCurso(CursoDAO::getById($_POST["select-curso"]));
    $aluno->setSemestre($_POST["select-semestre"]);
    $aluno->setBolsista($_POST["bolsista"]);
    $aluno->setUsuario($_POST["usuario"]);
    $aluno->setPassword($_POST["senha"]);
    $aluno->setEmail($_POST["email"]);
    $envia = new AlunoDAO();

    

    
    if(isset($_POST["id"])){
        $aluno->setId($_POST["id"]);
        $envia->update($aluno);
        $aluno2=alunoDAO::getById($_POST["id"]);
        $aluno2->getEndereco()->setRua($_POST["rua"]);
        $aluno2->getEndereco()->setNumero($_POST["numero"]);
        $aluno2->getEndereco()->setBairro($_POST["bairro"]);
        $aluno2->getEndereco()->setCidade($_POST["cidade"]);
        $aluno2->getEndereco()->setEstado($_POST["estado"]);
        $aluno2->getEndereco()->setCep($_POST["cep"]);
        $end = new EnderecoDAO();
        $end->update($aluno2->getEndereco());

    }
    else {
        $endereco = new Endereco();
        $endereco->setRua($_POST["rua"]);
        $endereco->setNumero($_POST["numero"]);
        $endereco->setBairro($_POST["bairro"]);
        $endereco->setCidade($_POST["cidade"]);
        $endereco->setEstado($_POST["estado"]);
        $endereco->setCep($_POST["cep"]);
        $end = new EnderecoDAO();
        $idEndereco = $end->insert($endereco);
        $endereco->setIdendereco($idEndereco);
        $aluno->setEndereco($endereco);
        $envia->insert($aluno);

    }
    
    }
    header("Location: ../pages/info-alunos.php");
    
?>