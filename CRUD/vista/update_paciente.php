<?php
    require_once("../controlador/controlador.php");
    $obj = new control();
    $user=$obj->show_paciente($_GET['idpaciente']);
    #
?>
<?php
require_once("../controlador/controlador.php");
$obj=new control();
$obj->update_paciente($_POST['id'],$_POST['nombres'],$_POST['apellidos'],$_POST['dni'],$_POST['fecha_nacimiento'])
#
?>
