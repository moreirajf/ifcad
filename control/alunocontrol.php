<?php
    function getCurso($aluno){
        $institutodao=new cursoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            if(isset($aluno)&&!empty($aluno)&&$aluno->getCurso()->getId()==$instituto->getId()){
                
           echo "<option value=".$instituto->getId()." selected>".$instituto->getNome()."</option>";
            
        }
        else echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }
    $aluno=null;
    if(isset($_POST["id"]))$aluno=alunoDAO::getById($_POST["id"]);
    else {
        $aluno=new Aluno();
        $end=new Endereco();
        $aluno->setEndereco($end);
        $aluno->setCurso(new Curso());
    }


    function testVal($val){
        if(isset($val)&&!empty($val)){
            echo $val;
        }else echo "";
    }

    function getSemestre($aluno){
        for($i=1;$i<=10;$i++){
            if(isset($aluno)&&!empty($aluno)&&$aluno->getSemestre()==$i){
                 echo "<option value='$i' selected>Semestre $i</option>";
            }
            else echo "<option value='$i'>Semestre $i</option>";
        }
    }

?>