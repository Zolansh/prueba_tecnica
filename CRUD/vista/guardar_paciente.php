<?php
require_once("../controlador/controlador.php");
$obj=new control();
$obj->insert_paciente($_POST['nombres'],['apellidos'],['dni'],['fecha_nacimiento']);