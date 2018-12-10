<?php

    function getDepartamento(){
        $institutodao=new DepartamentoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }


?>