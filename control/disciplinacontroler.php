<?php

    function getProfessores(){
        $institutodao=new ProfessorDao();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }

    function getCurso(){
        $institutodao=new cursoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }



?>