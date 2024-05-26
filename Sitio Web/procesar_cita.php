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
    $nombre = $_POST['NombrePaciente'];
    $correo = $_POST['correo'];
    $telefono = $_POST['Telefono'];
    $horario = $_POST['Horario'];
    $servicio = $_POST['Servicio'];
    $notas = $_POST['Notas'];

    // Prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $correo = mysqli_real_escape_string($conn, $correo);
    $telefono = mysqli_real_escape_string($conn, $telefono);
    $horario = mysqli_real_escape_string($conn, $horario);
    $servicio = mysqli_real_escape_string($conn, $servicio);
    $notas = mysqli_real_escape_string($conn, $notas);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO citas (NombrePaciente, correo, Telefono, Horario, Servicio, Notas) VALUES ('$nombre', '$correo', '$telefono', '$horario', '$servicio', '$notas')";

    if ($conn->query($sql) === TRUE) {
        echo "Cita agendada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
