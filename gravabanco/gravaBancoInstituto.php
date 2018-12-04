<?
    /**
     * endereco
     */

    require_once("../config/include.php");
    $endereco = new Endereco();
    $endereco->setRua($_POST["rua"]);
    $endereco->setNumero(intval($_POST["numero"]));
    $endereco->setBairro($_POST["bairro"]);
    $endereco->setCidade($_POST["cidade"]);
    $endereco->setEstado($_POST["estado"]);
    $endereco->setCep(intval($_POST["cep"]));

    $envia = new EnderecoDAO();
    $idEndereco = $envia->insert($endereco);
    $endereco->setIdendereco($idEndereco); 
    
    /**
     * instituto
     */
    $instituto = new Instituto();
    $instituto->setNome($_POST["nome"]);
    $instituto->setEndereco($endereco);

    $envia = new InstitutoDAO();
    $idInstituto = $envia->insert($instituto);
    $instituto->setId($idInstituto);
    echo $idInstituto;
    echo "<br>";
    
    echo $idEndereco;
    
    //header("Location: ../pages/info-universidades.php");
?>