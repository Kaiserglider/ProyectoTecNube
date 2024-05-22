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
          <a class="navbar-brand" href="verUsuarios.php">Jugueteria</a>
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
      $sql = "SELECT Productos.*, categorias.categoria AS categoria_nombre , productos.idjuguete as id
      FROM Productos 
      INNER JOIN Categorias ON Productos.idCategoria = Categorias.idCategoria";

      $resultado = $conn->query($sql);

      if ($resultado->num_rows > 0) {
        echo "<table class='table'>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                </tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>" . $fila['id'] . "</td>
                    <td>" . $fila['nombre'] . "</td>
                    <td>" . $fila['descripcion'] . "</td>
                    <td>" . $fila['cantidad'] . "</td>
                    <td>" . $fila['precio'] . "</td>
                    <td>" . $fila['categoria_nombre'] . "</td>
                    <td>
                      <a href='actualizarAlmacen.php?id=" . $fila['id'] . "' class='btn btn-primary'>Actualizar</a>
                      <a href='.cont_eliminarProducto.php?id=" . $fila['id'] . "' class='btn btn-danger'>Eliminar</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
      } else {
        echo "No hay productos disponibles.";
      }

      $conn->close();
    ?>
  </contenedor>
</body>
</html>