<?php

    function getProfessores($disciplina){
        $institutodao=new ProfessorDao();
        $array=$institutodao->select();
        foreach($array as $instituto){
            if(isset($disciplina)&&!empty($disciplina)&&$disciplina->getProfessor()->getId()==$instituto->getId()){
                echo "<option value='".$instituto->getId()."' selected>".$instituto->getNome()."</option>";
            }
            else echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }

    function getCurso($disciplina){
        $institutodao=new cursoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            if(isset($disciplina)&&!empty($disciplina)&&$disciplina->getCurso()->getId()==$instituto->getId()){
                echo "<option value='".$instituto->getId()."' selected>".$instituto->getNome()."</option>";
            }
            else echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }

    if(isset($_POST["id"])){
        $disciplina=DisciplinaDAO::getById($_POST["id"]);
    }

?>