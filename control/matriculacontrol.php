<?php

    function getAlunos(){
        $institutodao=new alunoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }

    function getDisciplinas(){
        $institutodao=new DisciplinaDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }



?>