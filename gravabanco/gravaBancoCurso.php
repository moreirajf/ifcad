<?
    /**
     * curso
     */
    $curso = new Curso();
    $curso->setNome();
    $curso->setDepartamento();
    $curso->setArea();
    $curso->setVagas();

    $envia = new CursoDAO();
    $idCurso = $envia->insert($curso);
    $curso->setId($idCurso);
?>