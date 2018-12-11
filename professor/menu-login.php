                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    
                        <?php if(isset($_SESSION["admin"])){?>
                            <li>
                            <a href="../pages/index.php"><span class="glyphicon glyphicon-wrench"></span> Admin</a>
                        </li>
                        <li class="divider"></li>
                            <?php }?>




                        <li><a href="../pages/login.php?end=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>