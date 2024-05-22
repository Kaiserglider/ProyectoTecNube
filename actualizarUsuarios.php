<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <!--NavBar-->
  <nav class="navbar navbar-expand-lg" style=" background-color: rgb(103, 153, 245);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Jugueteria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="verAlmacen.php">Ver Almacen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregarAlmacen.php">Agregar Producto</a>
          </li>
        </ul>
        <form class="d-flex" style="margin-right: 10px;">
          <a class="nav-link">Usuario</a>
        </form>
        <form class="d-flex" role="search">
          <a class="nav-link" href="index.php">Cerrar Sesion</a>
        </form>
      </div>
    </div>
  </nav>
  
  <!--Cuerpo-->
  <contenedor>
    <?php
    $nombre_servidor = "localhost"; 
    $username = "root";
    $password = "";
    $nombre_bd = "jugueteria_db";

    // Conexión a la base de datos
    $conn = new mysqli($nombre_servidor, $username, $password, $nombre_bd);

    // Verificar la conexión
    if ($conn->connect_error) {
      die("Falló la conexion: ". $conn->connect_error); //Si ocurre un error dara el mensaje de por qué y cerrar la conexion.
    }
    echo "Conexion exitosa!"; //Se elimina después

    // Obtener el ID del usuario a actualizar
    $id = $_GET['id'];

    // Obtener los datos actuales del usuario
    $sql = "SELECT * FROM Usuarios WHERE id=$id";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
      $fila = $resultado->fetch_assoc();
      $username = $fila['username'];
      $password = $fila['password'];
      $id_permiso = $fila['id_permiso'];
    }
    ?>
    <h1>Actualizar Usuario</h1>
    <form action="cont_actualizarUsuario.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Nombre de usuario:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
      </div>
      <div class="mb-3">
        <label for="permiso" class="form-label">Permiso:</label>
        <select id="permiso" name="permiso" class="form-select" required>
          <option value="1" <?php if($id_permiso == 1) echo 'selected'; ?>>Admin</option>
          <option value="2" <?php if($id_permiso == 2) echo 'selected'; ?>>Usuario</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </contenedor>
</body>
</html>
