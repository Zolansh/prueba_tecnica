<?php
    require_once("../controlador/controlador.php");
    $obj = new control();
    $obj->eliminar_paciente($_GET['id']);

?>