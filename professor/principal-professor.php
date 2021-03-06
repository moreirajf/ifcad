
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IFCAD - Professor</title>

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

<body>
<?php
    $access="professor";
        require_once "../config/include.php";
       
    ?>
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
                <a class="navbar-brand" href="principal-professor.php">IFCAD - Professor</a>
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
                    <h1 class="page-header">Professor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $professor= professorDAO::getById($_SESSION["iduser"]);
                    
                    
                    
                    ?>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Minhas Informações
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Departamento</th>
                                        <th>Coordenador</th>
                                        <th>Administrador</th>
                                        <th>Usuario</th>
                                        <th>Endereço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr class="odd gradeX">
                                            <input type="hidden" value=<?php echo $professor->getId();?> name="id">
                                            <td><?php echo $professor->getNome(); ?></td>
                                            <td><?php echo $professor->getTelefone(); ?></td>
                                            <td><?php echo $professor->getDepartamento()->getNome(); ?></td>
                                            <td><?php if($professor->getCoordenador()==1)echo "SIM";
                                                else echo "NÃO";
                                            ?></td>
                                            <td><?php if($professor->getAdministrador()==1)echo "SIM";
                                                else echo "NÃO";
                                            ?></td>
                                            <td><?php echo $professor->getUsuario(); ?></td>
                                            <td><?php echo $professor->getEndereco()->getRua().", ".$professor->getEndereco()->getNumero().", ".$professor->getEndereco()->getBairro().", ".$professor->getEndereco()->getCidade().", ".$professor->getEndereco()->getEstado(); ?></td>
                                        </tr>                           
                                </tbody>
                            </table>
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