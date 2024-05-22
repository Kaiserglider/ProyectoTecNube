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

$id = $_GET['id'];

// Obtener datos del producto
$sql = "SELECT * FROM Productos WHERE idJuguete = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
} else {
    echo "No se encontró el producto.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container">
        <h2>Editar Producto</h2>
        <form action="../controladores/cont_actualizarProducto.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto['nombre']; ?>">
                <div class="form-text">Nombre del Producto</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $producto['descripcion']; ?>">
                <div class="form-text">Ingrese la descripción del producto</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $producto['cantidad']; ?>">
                <div class="form-text">Ingrese la cantidad disponible</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $producto['precio']; ?>">
                <div class="form-text">Ingrese el precio del producto</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <select class="form-select" id="idCategoria" name="idCategoria">
                    <option value="1" <?php if ($producto['idCategoria'] == 1) echo 'selected'; ?>>Peluche</option>
                    <option value="2" <?php if ($producto['idCategoria'] == 2) echo 'selected'; ?>>Figura</option>
                    <option value="3" <?php if ($producto['idCategoria'] == 3) echo 'selected'; ?>>Sticker</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
