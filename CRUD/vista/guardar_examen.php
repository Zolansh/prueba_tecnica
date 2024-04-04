<?php

require_once("../controlador/controlador.php");
$obj=new control();
$obj->insert_examen($_POST["descripcion"]);