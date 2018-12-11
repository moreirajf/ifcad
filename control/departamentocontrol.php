<?php
    
    function getInstitutos($departamento){
        $institutodao=new InstitutoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            if(isset($departamento)&&!empty($departamento)&&$departamento->getInstituto()->getId()==$instituto->getId()){
                echo "<option value='".$instituto->getId()."' selected>".$instituto->getNome()."</option>";
            }
            else {
                echo "<option value='".$instituto->getId()."'>".$instituto->getNome()."</option>";
            }
        }
    }

    if(isset($_POST["id"])){
        $departamento=departamentoDAO::getById($_POST["id"]);
    }
?>