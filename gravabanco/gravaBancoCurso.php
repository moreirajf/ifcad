<?php
    /**
     * curso
     */    $access="admin";
     require_once("../config/include.php");


     if(isset($_POST["action"])){
        $curso =CursoDAO::getById($_POST["id"]);
        $envia = new CursoDAO();
        $envia->delete($curso);
     }
     else {



    $curso = new Curso();
    $curso->setNome($_POST["nome"]);
    $dep=new Departamento();
    $dep->setId(intval($_POST["select-departamento"]));
    $curso->setDepartamento($dep);
    $curso->setArea($_POST["area"]);
    $curso->setVagas(intval($_POST["vagas"]));

    $envia = new CursoDAO();
    
    if(isset($_POST["id"])){

        $curso->setId($_POST["id"]);
        $envia->update($curso);

    }
    else {

        $idCurso = $envia->insert($curso);
       $curso->setId($idCurso);

    }

}
    header("Location: ../pages/info-cursos.php");
?>