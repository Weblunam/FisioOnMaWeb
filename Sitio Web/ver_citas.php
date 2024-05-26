<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Citas Agendadas</title>
    <link rel="stylesheet" href="styleCitas.css">

    <link rel="shortcut icon" href="Images/logonav2.png">


    <!-- ICONS BOXICONS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--FUENTE FISIO ONMA ALEGREYA-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">

    <!-- BEBAS NEUE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- Montserrat Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class="table_users">
        <div class="header">Citas Agendadas</div>

    <table border="1" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nombre del Paciente</th>
            <th>Correo Electrónico</th>
            <th>Teléfono</th>
            <th>Horario</th>
            <th>Servicio</th>
            <th>Notas</th>
            <th>Acciones</th>
        </tr>
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

        // Obtener las citas de la base de datos
        $sql = "SELECT id, NombrePaciente, correo, Telefono, Horario, Servicio, Notas FROM citas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["NombrePaciente"] . "</td>";
                echo "<td>" . $row["correo"] . "</td>";
                echo "<td>" . $row["Telefono"] . "</td>";
                echo "<td>" . $row["Horario"] . "</td>";
                echo "<td>" . $row["Servicio"] . "</td>";
                echo "<td>" . $row["Notas"] . "</td>";
                echo "<td>
                        <form action='editar_cita.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input id='editar' type='submit' value='Editar'>
                        </form>
                        <form action='eliminar_cita.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input id='eliminar' type='submit' value='Eliminar'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No se encontraron citas</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    </div>
</body>
</html>
