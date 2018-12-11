<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IFCAD - Novo Professor</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php
$access="admin";
    require_once("../config/include.php");

require_once "../control/professorcontrol.php";
?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">IFCAD - Novo Professor</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="contato.php">
                            <i class="fa fa-fw"><span class="glyphicon glyphicon-envelope"></span></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="contato.php">Contato</a>
                            </li>
                        </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <?php include "menu-login.php"; ?>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php include "menu.php";?>
            <!-- /.navbar-static-side -->
        </nav>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Novo Professor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-8">
                            <form role="form" action="../gravabanco/gravaBancoProfessor.php" method="POST">

                            <?php
                                    if(isset($_POST["id"])){
                                        $id=$_POST["id"];
                                        echo "<input type='hidden' value='$id' name='id'>";
                                    }
                                    
                                    ?>
                                    <div class="form-group">
                                            <label for="input-nome">Nome: </label>
                                            <input id="input-nome" type="text" name="nome" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getNome()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-rua">Rua: </label>
                                            <input id="input-rua" type="text" name="rua" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getEndereco()->getRua()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-numero">Número: </label>
                                            <input id="input-numero" type="text" name="numero" class="form-control"<?php if(isset($professor)){
                                                echo "value='".$professor->getEndereco()->getNumero()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-bairro">Bairro: </label>
                                            <input id="input-bairro" type="text" name="bairro" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getEndereco()->getBairro()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-cidade">Cidade: </label>
                                            <input id="input-cidade" type="text" name="cidade" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getEndereco()->getCidade()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-estado">Estado: </label>
                                            <input id="input-estado" type="text" name="estado" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getEndereco()->getEstado()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-cep">CEP: </label>
                                            <input id="input-cep" type="text" name="cep" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getEndereco()->getCep()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-email">Email: </label>
                                            <input id="input-email" type="text" name="email" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getEmail()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-telefone">Telefone: </label>
                                            <input id="input-telefone" type="tel" name="telefone" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getTelefone()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label>Coordenador: </label>
                                            <div class="checkbox">
                                                <label>
                                                <input type='hidden' value="0" name='coordenador'>
                                                    <input type="checkbox" value="1" name="coordenador"  <?php   if(isset($professor)&&$professor->getCoordenador()==1) echo "checked"   ?>>
                                                </label>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="select-departamento">Departamento: </label>
                                            <select id="select-departamento" class="form-control" name="select-departamento">
                                            
                                            <?php getDepartamento($professor);?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-usuario">Usuário: </label>
                                            <input id="input-usuario" type="text" name="usuario" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getUsuario()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-senha">Senha: </label>
                                            <input id="input-senha" type="password" name="senha" class="form-control" <?php if(isset($professor)){
                                                echo "value='".$professor->getPassword()."'";
                                            }?>>
                                    </div>
                                    <div class="form-group">
                                            <label>Administrador: </label>
                                            <div class="checkbox">
                                                <label>
                                                <input type='hidden' value="0" name='administrador'>
                                                    <input type="checkbox" value="1" name="administrador" <?php   if(isset($professor)&&$professor->getAdministrador()==1) echo "checked"   ?>>
                                                </label>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Salvar">
                                    </div>
                            </form>

                             <?php if(isset($_POST["id"])){
                                        $id=$_POST["id"];
                                    ?>
                            <form action="../gravabanco/gravaBancoProfessor.php" method="POST">
                                <div class="form-group">
                                        <input type="hidden" value="<?php echo $id;?>" name='id'>
                                        <input type="hidden" value='remove' name='action'>
                                        <input type="submit" value="Excluir">
                                    </div>
                                </form>
                                <?php } ?>
                    </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
