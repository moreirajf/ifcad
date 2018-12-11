<?php
    if(!isset($_POST["iddisciplina"])){
        header("Location: info-disciplinas-professor.php");
    }



    if(isset($_POST["idaluno"])){
        $p1=0;
        $p2=0;
        $trabalho=0;
        $lista=0;
        
        if(isset($_POST["p1"]))
                $p1=$_POST["p1"];
        if(isset($_POST["p2"]))
                $p2=$_POST["p2"];

        if(isset($_POST["trabalho"]))
                $trabalho=$_POST["trabalho"];
        if(isset($_POST["lista"]))
                $lista=$_POST["lista"];
        $v= new cursaDisciplinaDAO();
        $v->update($_POST["iddisciplina"],$_POST["idaluno"],$p1,$p2,$trabalho,$lista);
    }


?>