<?php
    /**
     * endereco
     */

    require_once("../config/include.php");

    $endereco = new Endereco();
    $endereco->setRua($_POST["rua"]);
    $endereco->setNumero(intval($_POST["numero"]));
    $endereco->setBairro($_POST["bairro"]);
    $endereco->setCidade($_POST["cidade"]);
    $endereco->setEstado($_POST["estado"]);
    $endereco->setCep(intval($_POST["cep"]));

    $envia = new EnderecoDAO();
    $idEndereco = $envia->insert($endereco);
    $endereco->setIdendereco($idEndereco);

    /**
     * professor
     */

     $dep=new Departamento();
     $dep->setId($_POST["select-departamento"]);
    $professor= new Professor();
    $professor->setNome($_POST["nome"]);
    $professor->setEndereco($endereco);
    $professor->setTelefone(intval($_POST["telefone"]));
    $professor->setEmail($_POST["email"]);
    $professor->setCoordenador(intval($_POST["coordenador"]));
    $professor->setAdministrador(intval($_POST["administrador"]));
    $professor->setUsuario($_POST["usuario"]);
    $professor->setPassword($_POST["senha"]);
    $professor->setDepartamento($dep);
    echo "oi";
    echo "mae";
    $envia = new ProfessorDAO();
    $idProfessor = $envia->insert($professor);
    $professor->setId($idProfessor);
    echo "oi";
    echo "mae";
    header("Location: ../pages/index.php")
    
?>