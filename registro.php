<?php
$msg = null;
if(isset($_GET['msg'])) {$msg = $_GET['msg'];}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ingreso</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link rel="stylesheet" href="assets/css/signin.css">
</head>

<body class="text-center">
    <form class="form-signin" method="post" action="logica/registro.php">
        <img class="mb-4" src="https://toppng.com/uploads/preview/universidad-libre-vector-logo-free-download-11574018403cpyqgccfh9.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Formulario de registro</h1>

        <label for="inputNombre" class="sr-only">Nombre</label>
        <input type="text" id="inputNombre" name="nombre"
        class="form-control" placeholder="Nombre" required autofocus>
        
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" id="inputEmail" name="email"
        class="form-control" placeholder="Email" required >
        
        <label for="inputUsuario" class="sr-only">Teléfono</label>
        <input type="text" id="inputTelefono" name="telefono"
        class="form-control" placeholder="Teléfono" required >
        
        <label for="inputUsuario" class="sr-only">Usuario</label>
        <input type="text" id="inputUsuario" name="username"
        class="form-control" placeholder="Usuario" required >

        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="password"
        class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registro</button>
        <a class="link" href="login.php">Ingresar</a>
        <?php
        if($msg != null) {
            echo '<div class="alert alert-danger" role="alert">'.$msg.'</div>';
        } 
        ?>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>