<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>
    <link rel="stylesheet" href="styleCitas.css">
    <link rel="shortcut icon" href="Images/logonav2.png">
</head>
<body>

    
    <div class="form_container">

        <div class="img_banner">
            <h2>Agendar una Cita</h2>
            <P>"¡No esperes más para cuidar de ti mismo! 
                Agenda tu cita para dar el primer paso hacia un futuro más saludable y feliz. 
                ¡Tu bienestar es nuestra prioridad!"</P>
        </div>
    
    
        <form class="form_agendar" action="procesar_cita.php" method="POST">
            <label for="NombrePaciente">Nombre del Paciente:</label><br>
            <input type="text" id="NombrePaciente" name="NombrePaciente" required><br><br>
            
            <label for="correo">Correo Electrónico:</label><br>
            <input type="email" id="correo" name="correo" required><br><br>
            
            <label for="Telefono">Teléfono:</label><br>
            <input type="text" id="Telefono" name="Telefono" required><br><br>
            
            <label for="Horario">Horario:</label><br>
            <input type="datetime-local" id="Horario" name="Horario" required><br><br>
            
            <label for="Servicio">Servicio:</label><br>
            <select id="Servicio" name="Servicio" required>
                <option value="Terapia Deportiva">Terapia Deportiva</option>
                <option value="Terapia Neurológica">Terapia Neurológica</option>
                <option value="Reumatologías">Reumatologías</option>
                <option value="Traumatológicas">Traumatológicas</option>
            </select><br><br>
            
            <label for="Notas">Notas:</label><br>
            <textarea id="Notas" name="Notas"></textarea><br><br>
            
            <input class="btn_agendar" type="submit" value="Agendar Cita"><br><br>
            
            <a class="btn_agendar" href="index.php">Volver</a>

        </form>

    </div>


</body>
</html>
