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
    $nombre = $_POST['NombrePaciente'];
    $correo = $_POST['correo'];
    $telefono = $_POST['Telefono'];
    $horario = $_POST['Horario'];
    $servicio = $_POST['Servicio'];
    $notas = $_POST['Notas'];

    // Prevenir inyecciones SQL
    $id = mysqli_real_escape_string($conn, $id);
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $correo = mysqli_real_escape_string($conn, $correo);
    $telefono = mysqli_real_escape_string($conn, $telefono);
    $horario = mysqli_real_escape_string($conn, $horario);
    $servicio = mysqli_real_escape_string($conn, $servicio);
    $notas = mysqli_real_escape_string($conn, $notas);

    // Actualizar los datos en la base de datos
    $sql = "UPDATE citas SET NombrePaciente='$nombre', correo='$correo', Telefono='$telefono', Horario='$horario', Servicio='$servicio', Notas='$notas' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Cita actualizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
