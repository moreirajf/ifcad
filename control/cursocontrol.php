<?php
    function getDepartamentos(){
        $institutodao=new DepartamentoDAO($curso);
        $array=$institutodao->select();
        foreach($array as $instituto){
            if(isset($curso)&&!empty($curso)&&$curso->getDepartamento()->getId()==$instituto->getId()){
                echo "<option value='".$instituto->getId()."' selected>".$instituto->getNome()."</option>";
            }
            else {
                echo "<option value='".$instituto->getId()."'>".$instituto->getNome()."</option>";
            }
        }
    }
    if(isset($_POST["id"])){
        $curso=cursoDAO::getById($_POST["id"]);
    }
?>