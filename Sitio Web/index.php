<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectamos con la base de datos
    $conexion = new mysqli("localhost", "root", "", "seguridad");
 
    // Verificamos la conexión
    if ($conexion->connect_error) {
        die("Error al conectar con la base de datos: " . $conexion->connect_error);
    }
 
    // Obtenemos los datos del formulario
    $usuario = $_POST["email"];
    $contrasena = $_POST["password"]; // No aplicamos md5() aquí
 
    // Consulta SQL para verificar la existencia del usuario
    $sql = "SELECT * FROM usuarios WHERE usuarios='$usuario' AND us_password=('$contrasena')";
 
    // Ejecutamos la consulta
    $result = $conexion->query($sql);
 
    // Verificamos si se encontró un usuario con la contraseña proporcionada
    if ($result->num_rows > 0) {
        // Usuario y contraseña válidos, establecemos la sesión y redirigimos a la página de información
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
      
    }
 
    // Cerramos la conexión con la base de datos
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <script src="scrollreveal.js"></script>

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

    

    <title>Fisio On Ma | Inicio</title>
</head>
<body>
 

<!-- ======================= NAV BAR ================================ -->
<nav id="nav1">
    <div class="logo">
        <img src="Images/logonav2.png" alt="Logo Image">
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="TDeportiva.php">T. Deportiva </a></li>
        <li><a href="TNeuro.php">T. Neurológico</a></li>
        <li><a href="TReauma.php">Reumatologías</a></li>
        <li><a href="Traumato.php">T. Traumatológicas</a></li>
        <li><a href="contact.php">Contactanos</a></li>
        <li><button class="login-button" href="agendar.php"><a href="agendar.php" >AGENDAR</a></button></li>

        <li><button class="login-button" id="show_login">LOGIN</button></li>
    </ul>
</nav>

<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Fisio On Ma</h2>
                <p>
                    Somos tu mejor opción para tratar lesiones musculoesqueléticas con aplicaciones de electroterapia, 
                    ultrasonido y laser y lo mejor de todo te ofrecemos la mejor calidad y excelente servicio.
                </p>
                <a href="agendar.php" class="btnD1">AGENDAR</a>
            </div>
        </div>
    </div>

<!--LOGIN POPUP-->
    <div class="popup">
        <div class="close_btn">&times;</div>

        <form action="login.php" method="POST" id="form1">
    <div class="form">
        <h2>Login</h2>
        <div class="form_element">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Ingresar Correo">
        </div>
        <div class="form_element">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Ingresar Contraseña">
        </div>
        <div class="form_element">
            <input type="submit" id="form_element_btn" name="enviarLogin" value="Iniciar Sesion">
        </div>
    </div>
</form>
    </div>

</section>

<!-- =========================ACERCA DE====================================-->

<div class="section-abt">
    <div class="container-abt">
        <div class="titulo-abt">
            <h1>ACERCA DE NOSOTROS</h1>
        </div>
        <div class="contenido-abt">
            <div class="articulo-abt">
                <h3>Somos un centro de rehabilitación y terapia física con una amplia experiencia profesional en la rama de la rehabilitación4 física desde
                    2015 y hasta la fecha nuestro compromiso es mejorar la calidad de vida de cada uno de nuestros pacientes, 
                    por eso día a día nos seguimos actualizando en las novedades de terapia física. </h3>
                    <p>Contamos con tratamientos de Electroterapia, Ultrasonido Terapéutico, Laserterapia, 
                        Termoterapia y nuestro nuevo servicio adicional: Depilación Laser diodo. </p>
                    <div class="bton-abt">
                        <a href="agendar.php">Agendar</a>
                    </div>
            </div>
        </div>
        <div class="imag-abt">
            <img src="Images/acercaDe.png">
        </div>
        <div class="social-abt">
            <a href="https://www.facebook.com/FisioOnMa"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/526142197752"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.instagram.com/fisio_onma_terapia_fisica/"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>

<!-- =========================BANNER 2====================================-->
<section id = "banner-one" class = "banner-one text-center">
    <div class = "container-banner text-white">
        <blockquote class = "lead"><i class = "fas fa-quote-left"></i> 
            Tu cuerpo es tu compañero de vida, cuídalo, escúchalo y atiéndelo. 
            <i class = "fas fa-quote-right"></i></blockquote>
        <small class = "text text-sm"></small>
    </div>
</section>

<!-- =========================SERVICIOS====================================-->
<div class="container-serv">
    <div class="carta">
        <div class="fondo-carta img-uno"></div>
        <div class="contenido-carta">
            <h2>T. Deportiva</h2>
            <p>Ofrecemos tratamientos para Esguinces, Desgarre Muscular, Espasmo Muscular, 
                Tendinitis, Bursitis, Síndrome del Hombro Doloroso y Fascitis Plantar. </p>
            <a href="TDeportiva.html" class="botn-carta">Leer Más </a>
        </div>
    </div>

    <!--SERVICIO 2-->
    <div class="carta">
        <div class="fondo-carta img-dos"></div>
        <div class="contenido-carta">
            <h2>T. Neurológico</h2>
            <p>Atendemos problemas de Parálisis Facial, Síndrome del Túnel Carpiano, Lesión del Nervio CIATICO, Síndrome Piramidal, 
                Parálisis Cerebral Infantil, Estimulación Temprana y Fisioterapia Geriátrica. </p>
            <a href="TNeuro.html" class="botn-carta">Leer Más </a>
        </div>
    </div>

    <!--SERVICIO 3-->
    <div class="carta">
        <div class="fondo-carta img-tres"></div>
        <div class="contenido-carta">
            <h2>Reumatologías</h2>
            <p>Tratamientos enfocados para Artritis, Artrosis, Dedo de Gatillo y Fibromialgia. </p>
            
            <a href="TReauma.html" class="botn-carta">Leer Más </a>
        </div>
    </div>

    <!--SERVICIO 4-->
    <div class="carta">
        <div class="fondo-carta img-cuatro"></div>
        <div class="contenido-carta">
            <h2>Traumatológicas</h2>
            <p>Tratamientos Post Quirúrgicos, Fractura Post Traumática, Pre-Quirúrgico y Fractura de Cadera. </p>
            <a href="Traumato.html" class="botn-carta">Leer Más </a>
        </div>
    </div>
</div>


   

<!--SCRIPTS LINKS-->
<script src="index.js"></script>
</body>
</html>