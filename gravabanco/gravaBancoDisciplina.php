<?php
    /**
     * disciplina
     */    require_once("../config/include.php");

    $disciplina = new Disciplina();
    $disciplina->setNome($_POST["nome"]);
    $disciplina->setDescricao($_POST["descricao"]);
    $disciplina->setCargahoraria($_POST["cargahora"]);
    $curso=new Curso();
    $curso->setId($_POST["select-curso"]);
    $disciplina->setCurso($curso);
    
    
    $the_time = date('Y-m-d H:i:s', strtotime($_POST["horario"]));
    echo $_POST["horario"]."<br>".$the_time;

    $disciplina->setHorario($the_time);

    $disciplina->setSala($_POST["sala"]);
    $professor=new Professor();
    $professor->setId($_POST["select-professor"]);
    $disciplina->setProfessor($professor);

    $envia = new DisciplinaDAO();
    $idDisciplina = $envia->insert($disciplina);
    $disciplina->setId($idDisciplina); 

    header("Location: ../pages/info-disciplinas.php");

?>