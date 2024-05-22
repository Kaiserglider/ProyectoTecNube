<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" aria-current="page" href="verAlmacen.php">Ver Almacen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="agregarAlmacen.php">Agregar Producto</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a class="nav-link" href="index.php">Cerrar Sesion</a>
                </form>
            </div>
        </div>
    </nav>

    <!--Forms de Agregado de Informacion-->
    <form style="margin-top: 10px; margin-left: 15px;" action="cont_agregarProducto.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            <div class="form-text">Nombre del Producto</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            <div class="form-text">Ingrese la descripcion del producto</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            <div class="form-text">Ingrese la cantidad disponible</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            <div class="form-text">Ingrese el precio del producto</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select class="form-select" id="categoria" name="idCategoria" required>
                <option value="" selected disabled>Elija la Categoria</option>
                <option value="1">Peluche</option>
                <option value="2">Figura</option>
                <option value="3">Sticker</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>
