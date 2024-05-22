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

if (isset($_GET['id'])) {
    $idJuguete = $_GET['id'];

    // Eliminar el producto
    $sql = "DELETE FROM Productos WHERE idJuguete = $idJuguete";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();

?>
