
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IFCAD - Disciplinas Aluno</title>

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
    $access="aluno";
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
                <a class="navbar-brand" href="principal-aluno.php">IFCAD -  Disciplinas do Aluno</a>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../pages/login.php?end=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php include "menu.php";?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    
                    <h1 class="page-header">Disciplinas do Aluno</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="panel-body">
                    <?php   
                    $disciplinas = (new cursaDisciplinaDAO())->selectByAluno($_SESSION["iduser"]); ?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Carga Horaria</th>
                                <th>Professor</th>
                                <th>Prova 1</th>
                                <th>Prova 2</th>
                                <th>Trabalho</th>
                                <th>Lista</th>
                                <th>Média</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            for ($i = 0; $i < count($disciplinas); $i++) { 
                                $disciplina=DisciplinaDAO::getById($disciplinas[$i]["IDDISCIPLINA"]);
                                $vp1=$disciplinas[$i]["PROVA_1"];
                                $vp2=$disciplinas[$i]["PROVA_2"];
                                $vtrabalho=$disciplinas[$i]["TABALHO"];
                                $vlista=$disciplinas[$i]["LISTA"];
                                $nota=(floatval($vp1)+floatval($vp2)+floatval($vtrabalho)+floatval($vlista))/4;
                                $situacao="";
                                if($nota>=6)$situacao="APROVADO";
                                else if($nota<6&&$nota>=4)$situacao="EXAME FINAL";
                                else $situacao="REPROVADO";

                                ?>
                               
                                <tr class="odd gradeX">
                                
                                    
                                    <td><?php echo $disciplina->getNome(); ?></td>
                                    <td><?php echo $disciplina->getCargaHoraria(); ?></td>
                                    <td><?php echo $disciplina->getProfessor()->getNome(); ?></td>
                                    <td><?php echo $vp1; ?></td>
                                    <td><?php echo $vp2; ?></td>
                                    <td><?php echo $vtrabalho; ?></td>
                                    <td><?php echo $vlista; ?></td>
                                    <td><?php echo number_format($nota,2)?></td>
                                    <td><?php echo $situacao;?></td>
                                    
                                </tr>
                            
                            <?php } ?>                                   
                        </tbody>
                    </table>
                <!-- /.table-responsive -->
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