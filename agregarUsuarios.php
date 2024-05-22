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
                <a class="nav-link" aria-current="page" href="/almacen/verAlmacen.php">Ver Almacen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/almacen/agregarAlmacen.php">Agregar Producto</a>
              </li>
            </ul>
            <form class="d-flex" style="margin-right: 10px;">
              <a class="nav-link">Usuario</a>
            </form>
            <form class="d-flex" role="search">
              <a class="nav-link" href="../index.php">Cerrar Sesion</a>
            </form>
          </div>
        </div>
       </nav>
    <!--Forms de Agregado de Informacion-->
    <form style="margin-top: 10px; margin-left: 15px;" action="cont_agregarUsuario.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Usuario</label>
          <input type="text" class="form-control" id="username" name="username" required>
          <div class="form-text">Nombre de Usuario</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="form-text">Ingrese la contraseña</div>
        </div>
        <select id="permiso" name="permiso" required>
            <option value="1">Admin</option>
            <option value="2">Usuario</option>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</body>
</html>