<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php 
    $login=true;
    $access="none";
    require_once("../config/include.php");
    
    if(isset($_GET["end"])){
        session_destroy();
        unset($_SESSION);
    }

    $erro="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuario=$_POST["usuario"];
        $senha=$_POST["senha"];
        if($senha=="admin"&&$usuario=="admin"){
            session_start();
            $_SESSION["admin"]=true;
            $_SESSION["logged"]=true;
            header("Location: index.php");
        }

        $dao=new professorDAO();
        $professor=$dao->tryLogin($usuario,$senha);
        
        if($professor!=null){
            if($professor->getAdministrador()){
                session_start();
                $_SESSION["logged"]=true;
                $_SESSION["admin"]=true;
                $_SESSION["iduser"]=$professor->getId();
                $_SESSION["professor"]=true;
               header("Location: ../professor/principal-professor.php");
            }
            else{
                session_start();
                $_SESSION["logged"]=true;
                $_SESSION["iduser"]=$professor->getId();
                $_SESSION["professor"]=true;
              header("Location: index.php");
            }
        }
        $dao=new alunoDAO();
        $aluno=$dao->tryLogin($usuario,$senha);
        if($aluno!=null){
                session_start();
                $_SESSION["logged"]=true;
                $_SESSION["iduser"]=$aluno->getId();
                $_SESSION["aluno"]=true;
                header("Location: index.php");
            }
            else {
                $erro="Usuário não encontrado";               
            } 
   }

?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Indentifique-se</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="USUARIO" name="usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="SENHA" name="senha" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="lembrar" type="checkbox" value="Lembre-me">Lembre-me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                <?php if(isset($erro)) echo $erro;?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
