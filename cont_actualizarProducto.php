<?php
header("Location:verAlmacen.php");
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idJuguete = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $idCategoria = $_POST['idCategoria'];

    // Actualizar los datos del producto
    $sql = "UPDATE Productos SET 
                nombre = '$nombre', 
                descripcion = '$descripcion', 
                cantidad = $cantidad, 
                precio = $precio, 
                idCategoria = $idCategoria 
            WHERE idJuguete = $idJuguete";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
