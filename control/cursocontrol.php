<?php
    function getDepartamentos(){
        $institutodao=new Departamento();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }
?>