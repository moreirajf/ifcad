<?
    /**
     * departamento
     */
    $departamento = new Departamento();
    $departamento->setNome();
    $departamento->setTelefone();
    $departamento->setInstituto();

    $envia = new DepartamentoDAO();
    $idDepartamento = $envia->insert($departamento);
    $departamento->setId($idDepartamento); 

?>