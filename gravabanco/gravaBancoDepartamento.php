<?php
    /**
     * departamento
     */    $access="admin";
     require_once("../config/include.php");





     if(isset($_POST["action"])){
        $departamento =DepartamentoDAO::getById($_POST["id"]);
        $envia = new DepartamentoDAO();
        $envia->delete($departamento);
     }
     else {
        $departamento = new Departamento();
        $departamento->setNome($_POST["nome"]);
        $departamento->setTelefone($_POST["telefone"]);

        $instituto=new Instituto();
        $instituto->setId($_POST["select-universidade"]);
        $departamento->setInstituto($instituto);
        echo $_POST["select-universidade"];
        $envia = new DepartamentoDAO();
        
        if(isset($_POST["id"])){
            $departamento->setId($_POST["id"]);    
            $envia->update($departamento);
        }else {
        
        $idDepartamento = $envia->insert($departamento);
        $departamento->setId($idDepartamento);
        }
     }
    header("Location: ../pages/info-departamentos.php");

?>