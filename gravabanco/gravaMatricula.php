<?php
    require_once "../config/include.php";
    $disciplina=$_POST['select-discip'];
    $aluno=$_POST['select-alun'];
    $dao=new cursaDisciplinaDAO();
    $dao->insert($aluno,$disciplina);
    //header("Location: ../pages/matric-aluno-em-discip.php");

?>