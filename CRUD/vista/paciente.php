<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PACIENTE</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="guardar_paciente.php" method="post">
        <input type="text" placeholder="ingresar nombres" name="nombres">
        <input type="text" placholder="apellidos" name="apellidos">
        <input type="text" placeholder="dni" name="dni">
        <input type="date" name="fecha_nacimiento">
        <input type="submit" value="ingrsar">
    </form>
    <?php
    require_once("../controlador/controlador.php");
    $obj=new control();
    $rows=$obj->index_paciente();
    ?>
     <table class="table align-items-center mb-0">
                  <thead>
                  <tr>
                    <th  class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nombre</th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0">apellidos</th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0">dni</th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0">fech</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                  <?php if ($rows) :?> 
                    <?php foreach ($rows as $row): ?> 
                    <tr>
                    <th hidden class="text-xs font-weight-bold mb-0"><?=$row[0]?></th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?=$row[1]?></th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?=$row[2]?></th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?=$row[3]?> </th>
                    <th class="align-middle text-center text-sm text-xs font-weight-bold mb-0"><?=$row[4]?> </th>
                    <th>
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#id<?=$row[0]?>">Eliminar</a>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ide<?=$row[0]?>"> Editar</button>
                        <!-- Modal -->
                        <div class="modal fade" id="id<?=$row[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar el registro?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>  
                                <div class="modal-body">
                                    Una vez eliminado no se podra recuperar el registro
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                    <a href="delete_paciente.php?id=<?= $row[0]?>" class="btn btn-danger">Eliminar</a>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ide<?=$row[0]?>" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">      
                    <div class="modal-dialog modal-dialog-scrollable" >
                      <div class="modal-content">
                        <form action="update_paciente.php" method="post">
                        <input  type="text" name="id" readonly class="form-control" value="<?= $row[0]?>" required>
                        <input type="text" placeholder="ingresar nombres" name="nombres">
                        <input type="text" placholder="apellidos" name="apellidos">
                        <input type="text" placeholder="dni" name="dni">
                        <input type="date" name="fecha_nacimiento">
                        <input type="submit" value="editar">
                        </form>
                      </div>
                    </div>
                  </div>
                    </th>
                    </tr>
                    <?php endforeach;?>
                      <?php else:?>
                      <tr>
                          <th class="text-xs font-weight-bold">No hay registros</th>
                      </tr>
                      <?php endif;?>
                      </tr>
                  </tbody>
                </table>
</body>
</html>