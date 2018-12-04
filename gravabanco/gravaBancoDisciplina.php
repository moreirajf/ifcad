<?
    /**
     * disciplina
     */
    $disciplina = new Disciplina();
    $disciplina->setNome();
    $disciplina->setDescricao();
    $disciplina->setCargahoraria();
    $disciplina->setCurso();
    $disciplina->setHorario();
    $disciplina->setProfessor();

    $envia = new DisciplinaDAO();
    $idDisciplina = $envia->insert($endereco);
    $disciplina->setId($idDisciplina); 

?>