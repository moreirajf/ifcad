<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IFCAD - Info Disciplinas</title>

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
    $access="admin";
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
                <a class="navbar-brand" href="index.php">IFCAD - Info Disciplinas</a>
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
                    <h1 class="page-header">Info Disciplinas</h1>
                </div></div>
                <!-- /.col-lg-12 -->
                <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Disciplinas
                            </div>
                <!-- /.col-lg-12 -->
                <div class="panel-body">
                    <?php  $minhasDisciplinas = (new disciplinaDao())->select(); ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Carga Horária</th>
                                <th>Curso</th>
                                <th>Horário</th>
                                <th>Sala</th>
                                <th>Professor</th>
                                <th>Ação</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($minhasDisciplinas); $i++) { ?>
                                <tr class="odd gradeX">
                                    <form action="nova-disciplina.php" method="post">
                                        <input type="hidden" value=<?php echo $minhasDisciplinas[$i]->getId();?> name="id">
                                        <td><?php echo $minhasDisciplinas[$i]->getNome(); ?></td>
                                        <td><?php echo $minhasDisciplinas[$i]->getDescricao(); ?></td>
                                        <td><?php echo $minhasDisciplinas[$i]->getCargahoraria();; ?></td>
                                        <td><?php echo $minhasDisciplinas[$i]->getCurso()->getNome(); ?></td>
                                        <td><?php echo $minhasDisciplinas[$i]->getHorario(); ?></td>
                                        <td><?php echo $minhasDisciplinas[$i]->getSala(); ?></td>
                                        <td><?php echo $minhasDisciplinas[$i]->getProfessor()->getNome(); ?></td>
                                        <td>
                                            <input type="submit" value="EDITAR">
                                        </td>
                                    </form>
                                </tr>
                            <?php } ?>                                   
                        </tbody>
                    </table>
                <!-- /.table-responsive -->
                </div>
                            </div>


            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
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
