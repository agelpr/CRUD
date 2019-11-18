<?php include_once 'includes/header.php' ?>

  <?php
  include_once 'db.php';

    if (isset($_POST['save_task'])) {//RECIBO LO QUE VIENE DEL BOTON DEL FORMULARIO
      $titulo =  $_POST['title']; //RECIBO LO QUE VIENE DEL INPUT CON ESTE NOMBRE
      $descripcion =  $_POST['descripcion'];//RECIBO LO QUE VIENE DEL INPUT CON ESTE NOMBRE

      $querys = "INSERT INTO task(titulo, descripcion) VALUES ('$titulo', '$descripcion')";//HAGO LA CONSULTA
      $result = mysqli_query($conn, $querys);//GUARDO LA CONSULTA, PASANDO LOS PARAMETROS DE LA BD Y DEL QUERY

      if (!$result) {// VERIFICO  SI ALGO FALLO
        die("Query Failed");
      }

      $_SESSION['mensaje'] = 'Se ha creado la tarea';//ESTO ES PARA MOSTRAR LA ALERTA DE QUE SE GUARDO EL REGISTRO
      $_SESSION['tipo-mensaje'] = 'success';

      header("location: inicio.php");//REDIRIJO AL INDEX
    }

   ?>

<?php include_once 'includes/footer.php' ?>
