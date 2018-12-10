<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IFCAD - Nova Disciplina</title>

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
    require_once "../config/include.php";
    require_once "../control/disciplinacontroler.php";
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
                <a class="navbar-brand" href="index.php">IFCAD - Nova Disciplina</a>
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h1 class="page-header">Nova Disciplina</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-8">
                            <form role="form" action="../gravabanco/gravaBancoDisciplina.php" method="post">
                                    <div class="form-group">
                                            <label for="input-nome">Nome: </label>
                                            <input id="input-nome" type="text" name="nome" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="input-descricao">Descrição: </label>
                                            <input id="input-descricao" type="text" name="descricao" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="input-cargahora">Carga Horária: </label>
                                            <input id="input-cargahora" type="text" name="cargahora" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="select-curso">Curso: </label>
                                            <select id="select-curso" class="form-control" name="select-curso">
                                                <?php
                                                getCurso();
                                                ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="input-horario">Horário: </label>
                                            <input id="input-horario" type="time" name="horario" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="input-sala">Sala: </label>
                                            <input id="input-sala" type="number" name="sala" class="form-control">
                                    </div>
                                    <div class="form-group">
                                            <label for="select-professor">Professor: </label>
                                            <select id="select-professor" class="form-control" name="select-professor">
                                            <?php
                                                getProfessores();
                                                ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Salvar">
                                    </div>
                            </form>
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
