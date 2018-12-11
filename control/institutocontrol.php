<?php
if(isset($_POST["id"])){
    $instituto=institutoDAO::getById($_POST["id"]);
}
?>