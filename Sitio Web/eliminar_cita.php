<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fisioonmaweb";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Prevenir inyecciones SQL
    $id = mysqli_real_escape_string($conn, $id);

    // Eliminar la cita de la base de datos
    $sql = "DELETE FROM citas WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Cita eliminada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
