<?php
    /**
     * departamento
     */    require_once("../config/include.php");

    $departamento = new Departamento();
    $departamento->setNome($_POST["nome"]);
    $departamento->setTelefone($_POST["telefone"]);

    $instituto=new Instituto();
    $instituto->setId($_POST["select-universidade"]);
    $departamento->setInstituto($instituto);
    echo $_POST["select-universidade"];
    $envia = new DepartamentoDAO();
    $idDepartamento = $envia->insert($departamento);
    $departamento->setId($idDepartamento);
    header("Location: ../pages/info-departamentos.php");

?>