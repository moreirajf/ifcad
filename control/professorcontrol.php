<?php

    function getDepartamento($professor){
        $institutodao=new DepartamentoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            if(isset($professor)&&!empty($professor)&&$professor->getDepartamento()->getId()==$instituto->getId()){
                echo "<option value=".$instituto->getId()." selected>".$instituto->getNome()."</option>";
           }
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }

    if(isset($_POST["id"])){
        $professor=professorDAO::getById($_POST["id"]);
    }
?>