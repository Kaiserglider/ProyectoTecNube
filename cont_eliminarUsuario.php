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

    // Verificar si se recibió el ID del usuario a eliminar
    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta SQL para eliminar el usuario
        $sql = "DELETE FROM Usuarios WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Se eliminó el usuario correctamente";
        } else {
            echo "Ocurrió un error al intentar eliminar el usuario: " . $conn->error;
        }
    } else {
        echo "ID de usuario no especificado";
    }

    $conn->close();
?>
