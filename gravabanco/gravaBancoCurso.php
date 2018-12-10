<?php
    /**
     * curso
     */    require_once("../config/include.php");

    $curso = new Curso();
    $curso->setNome($_POST["nome"]);
    $dep=new Departamento();
    $dep->setId(intval($_POST["select-departamento"]));
    $curso->setDepartamento($dep);
    $curso->setArea($_POST["area"]);
    $curso->setVagas(intval($_POST["vagas"]));

    $envia = new CursoDAO();
    $idCurso = $envia->insert($curso);
    $curso->setId($idCurso);

    header("../pages/info-cursos.php");
?>