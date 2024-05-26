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

    // Obtener la cita de la base de datos
    $sql = "SELECT * FROM citas WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Cita</title>
            <link rel="stylesheet" href="styleCitas.css">
            <link rel="shortcut icon" href="Images/logonav2.png">
        </head>

        <body>
        <div class="form_container">

            <div class="img_banner">
                <h2>EDITAR CITA</h2>
                <P></P>
            </div>

            <form class="form_agendar" action="actualizar_cita.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <label for="NombrePaciente">Nombre del Paciente:</label><br>
                <input type="text" id="NombrePaciente" name="NombrePaciente" value="<?php echo $row['NombrePaciente']; ?>" required><br><br>
                
                <label for="correo">Correo Electrónico:</label><br>
                <input type="email" id="correo" name="correo" value="<?php echo $row['correo']; ?>" required><br><br>
                
                <label for="Telefono">Teléfono:</label><br>
                <input type="text" id="Telefono" name="Telefono" value="<?php echo $row['Telefono']; ?>" required><br><br>
                
                <label for="Horario">Horario:</label><br>
                <input type="datetime-local" id="Horario" name="Horario" value="<?php echo date('Y-m-d\TH:i', strtotime($row['Horario'])); ?>" required><br><br>
                
                <label for="Servicio">Servicio:</label><br>
                <select id="Servicio" name="Servicio" required>
                    <option value="Terapia Deportiva" <?php if($row['Servicio'] == 'Terapia Deportiva') echo 'selected'; ?>>Terapia Deportiva</option>
                    <option value="Terapia Neurológica" <?php if($row['Servicio'] == 'Terapia Neurológica') echo 'selected'; ?>>Terapia Neurológica</option>
                    <option value="Reumatologías" <?php if($row['Servicio'] == 'Reumatologías') echo 'selected'; ?>>Reumatologías</option>
                    <option value="Traumatológicas" <?php if($row['Servicio'] == 'Traumatológicas') echo 'selected'; ?>>Traumatológicas</option>
                </select><br><br>
                
                <label for="Notas">Notas:</label><br>
                <textarea id="Notas" name="Notas"><?php echo $row['Notas']; ?></textarea><br><br>
                
                <input class="btn_agendar" type="submit" value="Actualizar Cita">
            </form>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontró la cita";
    }
}

$conn->close();
?>
