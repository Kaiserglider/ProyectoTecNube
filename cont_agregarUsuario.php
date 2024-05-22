<?php
header("Location:verUsuarios.php");
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

// Recibir datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
$permiso = $_POST['permiso'];

// Insertar datos en la tabla Usuarios
$sql = "INSERT INTO Usuarios (username, password, id_permiso) VALUES ('$username', '$password', '$permiso')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario agregado correctamente";
} else {
    echo "Error al agregar usuario: " . $conn->error;
}

$conn->close();

?>
