<?php
    
    function getInstitutos(){
        $institutodao=new InstitutoDAO();
        $array=$institutodao->select();
        foreach($array as $instituto){
            echo "<option value=".$instituto->getId().">".$instituto->getNome()."</option>";
        }
    }
?>