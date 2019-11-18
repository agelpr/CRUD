  <?php
  include_once 'db.php';
  include_once 'includes/header.php';

  if (isset($_GET[id])) {
    $id = $_GET['id'];//OBTENGO EL ID QUE ESTOY SOLICITANDO DESDE EL INDE
    $querys = "DELETE FROM task WHERE id = $id";
    $resultado_delete = mysqli_query($conn, $querys);

    if (!$resultado_delete) {
      die("Algo ha fallado");
    }

    $_SESSION['mensaje'] = 'Se ha borrado la tarea';//ESTO ES PARA MOSTRAR LA ALERTA DE QUE SE GUARDO EL REGISTRO
    $_SESSION['tipo-mensaje'] = 'danger';

    header("location: inicio.php");//REDIRIJO AL INDEX
  }
 ?>
