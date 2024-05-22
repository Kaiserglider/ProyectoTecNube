<?php
$nombre_servidor = "practicadb-jl.mysql.database.azure.com"; 
$username = "joselopez";
$password = "xEU817<DV@sH";
$nombre_bd = "jugueteria_db";

// Conexión a la base de datos
$conn = new mysqli($nombre_servidor, $username, $password, $nombre_bd);

// Verificar la conexión
if ($conn->connect_error) {
    die("Falló la conexión: " . $conn->connect_error);
}

  //Crear la base de datos
  $sql = "CREATE DATABASE IF NOT EXISTS jugueteria_db";
  //Correr SQL
  if ($conn->query($sql) === TRUE) {
    echo "Se creó la base de datos exitosamente!";
  } else {
    echo "Ocurrió un error al tratar de crear la base de datos". $conn->error;
  }

  //Usar la BD
  $sql = "USE jugueteria_db";
  if ($conn->query($sql) === TRUE) {
    echo "Se usó la base de datos";
  } else {
    echo "Ocurrió un error al intentar de usar la base de datos". $conn->error;
  }

  //Crear tablas
  $sql = "CREATE TABLE IF NOT EXISTS permisos(
    id INT(1) AUTO_INCREMENT,
    permiso VARCHAR(50),
    usuario VARCHAR(50),
    PRIMARY KEY(id)
  )";

  //Correr SQL
  if ($conn->query($sql) === TRUE) {
    echo "Se creó la tabla permisos correctamente";
  } else {
    echo "Ocurrió un error al crear la tabla permisos". $conn->error;
  }

  $sql = "CREATE TABLE IF NOT EXISTS Usuarios(
    id INT(3) AUTO_INCREMENT,
    username VARCHAR(50),
    password VARCHAR(20),
    id_permiso INT(1),
    PRIMARY KEY(id),
    FOREIGN KEY (id_permiso) REFERENCES permisos(id)
  )";
   if ($conn->query($sql) === TRUE) {
    echo "Se creó la tabla usuarios correctamente";
  } else {
    echo "Ocurrió un error al crear la tabla usuarios". $conn->error;
  }

  //Crear tablas del almacen:
 
  $sql = "CREATE TABLE IF NOT EXISTS Categorias(
    idCategoria INT(10) AUTO_INCREMENT,
    categoria VARCHAR(100),
    PRIMARY KEY(IdCategoria)
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Se creó la tabla categorias correctamente";
  } else {
    echo "Ocurrió un error al crear la tabla categorias". $conn->error;
  }
  $sql = "CREATE TABLE IF NOT EXISTS Productos(
    idJuguete INT(10) AUTO_INCREMENT,
    nombre VARCHAR(100),
    descripcion VARCHAR(250),
    precio DECIMAL(10,2),
    cantidad INT(10),
    idCategoria INT(10),
    Primary Key(idJuguete),
    Foreign Key (idCategoria) REFERENCES Categorias(idCategoria)
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Se creó la tabla categorias correctamente";
  } else {
    echo "Ocurrió un error al crear la tabla categorias". $conn->error;
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
              <li class="nav-item">
                <a class="nav-link" href="agregarUsuarios.php">Agregar Usuarios</a>
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
        $sql = "SELECT Usuarios.*, permisos.usuario AS permiso FROM Usuarios INNER JOIN permisos ON Usuarios.id_permiso = permisos.id";
        $resultado = $conn->query($sql);
        if ($resultado ->num_rows > 0) {
          echo "<table class='table is bordered is-hoverable'>
            <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>permiso</th>
            </tr>
          ";
        }
        while ($fila = $resultado->fetch_assoc()) {
          echo "<tr>
                  <td>" . $fila['id'] . "</td>
                  <td>" . $fila['username'] . "</td>
                  <td>" . $fila['password'] . "</td>
                  <td>" . $fila['permiso'] . "</td>
                  <td>
                      <a href='actualizarUsuarios.php?id=" . $fila['id'] . "' class='btn btn-primary'>Actualizar</a>
                      <a href='cont_eliminarUsuario.php?id=" . $fila['id'] . "' class='btn btn-danger'>Eliminar</a>
                  </td>
                </tr>";
      }
      
      $conn->close();
      ?>

    </form>
  </contenedor>
</body>
</html>