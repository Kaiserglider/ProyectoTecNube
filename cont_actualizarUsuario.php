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

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['id'])) $id = $_POST['id'];
    if (isset($_POST['username'])) $username = $_POST['username'];
    if (isset($_POST['password'])) $password = $_POST['password'];
    if (isset($_POST['permiso'])) $id_permiso = $_POST['permiso'];
}

// String de Update
$sql = "UPDATE Usuarios
        SET username ='".$username."', password = '".$password."', id_permiso = '".$id_permiso."'
        WHERE id = ".$id;

if ($conn->query($sql) === TRUE) {
    echo "Se actualizó la tabla";
} else {
    echo "Ocurrió un error: " . $conn->error;
}
$conn->close();

?>
