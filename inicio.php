<?php include_once 'db.php'; ?>
<?php include_once 'includes/header.php'?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php if (isset($_SESSION['mensaje'])) { ?><!--valido si existe algo en el mensaje-->
          <div class="alert alert-<?= $_SESSION['tipo-mensaje']?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['mensaje']  ?><!--muestro el mensaje-->
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" value="" class="form-control" placeholder="Ingrese el Titulo" autofocus>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Ingrese la Descripción"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar" >
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha de Creación</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $querys = "SELECT * FROM task";//llamo los datos de la BASE DE DATOS
            $resultado_tareas = mysqli_query($conn, $querys);

            while($fila = mysqli_fetch_array($resultado_tareas)) { ?>
                <tr>
                  <td><?php echo $fila['titulo']?></td><!--llamo a los datos desde las columnas de la bd-->
                  <td><?php echo $fila['descripcion']?></td></td><!--llamo a los datos desde las columnas de la bd-->
                  <td><?php echo $fila['F_Creacion']?></td></td><!--llamo a los datos desde las columnas de la bd-->
                  <td>
                    <a class="btn btn-primary" href="edit-task.php?id=<?php echo $fila['id']?>">Editar</a><!--verifica el 47:51-->
                    <a class="btn btn-danger" href="delete-task.php?id=<?php echo $fila['id']?>">Eliminar</a><!--posiciono el id-->
                  </td>
                </tr>
           <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>




<?php include_once 'includes/footer.php'?>
