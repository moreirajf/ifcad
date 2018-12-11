<?php
    /**
     * endereco
     */

    $access="admin";
     require_once("../config/include.php");



    if(isset($_POST["action"])){

        $professor =professorDAO::getById($_POST["id"]);
        $end=new enderecoDAO();
        $end->delete($professor->getEndereco());
        $envia = new professorDAO();
        $envia->delete($professor);
    }


    else{



    $endereco = new Endereco();
    $endereco->setRua($_POST["rua"]);
    $endereco->setNumero(intval($_POST["numero"]));
    $endereco->setBairro($_POST["bairro"]);
    $endereco->setCidade($_POST["cidade"]);
    $endereco->setEstado($_POST["estado"]);
    $endereco->setCep(intval($_POST["cep"]));
    



    

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

    $envia = new ProfessorDAO();
    

    if(isset($_POST["id"])){
        $professor->setId($_POST["id"]);
        $envia->update($professor);
        $professor2=professorDAO::getById($_POST["id"]);
        $professor2->getEndereco()->setRua($_POST["rua"]);
        $professor2->getEndereco()->setNumero($_POST["numero"]);
        $professor2->getEndereco()->setBairro($_POST["bairro"]);
        $professor2->getEndereco()->setCidade($_POST["cidade"]);
        $professor2->getEndereco()->setEstado($_POST["estado"]);
        $professor2->getEndereco()->setCep($_POST["cep"]);
        $end = new EnderecoDAO();
        $end->update($professor2->getEndereco());
    }
    else {
        $envia = new EnderecoDAO();
        $idEndereco = $envia->insert($endereco);
        $endereco->setIdendereco($idEndereco);
        $envia = new ProfessorDAO();
        $idProfessor = $envia->insert($professor);
        $professor->setId($idProfessor);

    }
}
    
    header("Location: ../pages/info-professor.php")
    
?>