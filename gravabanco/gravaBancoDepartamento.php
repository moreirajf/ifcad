<?
    /**
     * departamento
     */
    $departamento = new Departamento();
    $departamento->setNome($_POST["nome"]);
    $departamento->setTelefone($_POST["telefone"]);
    $departamento->setInstituto($_POST["select-universidade"]);

    $envia = new DepartamentoDAO();
    $idDepartamento = $envia->insert($departamento);
    $departamento->setId($idDepartamento);
    header("Location: ../pages/info-departamento.php");

?>