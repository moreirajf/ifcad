<?php
    $access="admin";

    require_once("../config/include.php");




    if(isset($_POST["action"])){
        $instituto =InstitutoDAO::getById($_POST["id"]);
        $end=new enderecoDAO();
        $end->delete($instituto->getEndereco());
        $envia = new InstitutoDAO();
        $envia->delete($instituto);
    }
    else {
    $endereco = new Endereco();
    $endereco->setRua($_POST["rua"]);
    $endereco->setNumero(intval($_POST["numero"]));
    $endereco->setBairro($_POST["bairro"]);
    $endereco->setCidade($_POST["cidade"]);
    $endereco->setEstado($_POST["estado"]);
    $endereco->setCep(intval($_POST["cep"]));


    $instituto = new Instituto();
    $instituto->setNome($_POST["nome"]);
    $instituto->setEndereco($endereco);

    $envia = new InstitutoDAO();
    
    if(isset($_POST["id"])){
        $instituto->setId($_POST["id"]);
        $envia->update($instituto);
        $aluno2=InstitutoDAO::getById($_POST["id"]);
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
        $instituto->setEndereco($endereco);
        $envia->insert($instituto);

    }


}
    header("Location: ../pages/info-universidades.php");
?>