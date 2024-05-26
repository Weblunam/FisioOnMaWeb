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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prevenir inyecciones SQL
    $email = mysqli_real_escape_string($conn, $email);

    // Consulta a la base de datos
    $sql = "SELECT * FROM doctores WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Verificar la contraseña
        $row = $result->fetch_assoc();
        echo "Password ingresado: $password<br>";
        echo "Password almacenado: " . $row['password'] . "<br>";
        if (password_verify($password, $row['password'])) {
            // Inicio de sesión exitoso
            echo "Inicio de sesión exitoso";
            
            exit(); // Asegúrate de detener la ejecución del script después del redireccionamiento
        } else {
            header("Location: ver_citas.php");
        }
    } else {
        echo "No se encontró una cuenta con ese correo electrónico";
    }
}

$conn->close();
?>