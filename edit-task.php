<?php
  include_once 'db.php';
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $querys = "SELECT * FROM task WHERE id = $id";
    $resultado = mysqli_query($conn, $querys);

    if (mysqli_num_rows($resultado) == 1) {//verifico fila por fila cual es el id
      $fila = mysqli_fetch_array($resultado);
      $titulo = $fila['titulo'];
      $descripcion = $fila['descripcion'];
    }
  }

  if (isset($_POST['update'])) {
    $id = $_GET['id'];//OBTENGO EL ID QUE ESTOY SOLICITANDO DESDE EL INDE
    $titulo= $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $querys = "UPDATE task set titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id"; //actualizo solo donde el id sea que el que estoy trayendo desde el formulario
    mysqli_query($conn, $querys);

    $_SESSION['mensaje'] = "Actualizó la tarea";
    $_SESSION['tipo-mensaje'] = 'primary';
    header("location: inicio.php");

  }
 ?>

<?php include_once 'includes/header.php'; ?>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
          <form class="" action="edit-task.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="form-group">
              <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualiza el Titulo">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="descripcion" rows="2"><?php echo $descripcion; ?></textarea>
            </div>
            <button class="btn btn-primary btn-block" name="update">
              Actualizar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include_once 'includes/footer.php'; ?>
