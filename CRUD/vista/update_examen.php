<?php
    require_once("../controlador/controlador.php");
    $obj = new control();
    $user=$obj->show_examen($_GET['idexamen']);
    #
?>
<?php
require_once("../controlador/controlador.php");
$obj=new control();
$obj->update_examen($_POST['id'],$_POST['descripcion'])
#
?>
