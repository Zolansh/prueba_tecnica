<?php
    require_once("../controlador/controlador.php");
    $obj = new control();
    $obj->eliminar_examen($_GET['id']);

?>