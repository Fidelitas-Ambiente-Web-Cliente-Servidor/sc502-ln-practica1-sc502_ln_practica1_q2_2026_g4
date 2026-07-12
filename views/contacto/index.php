<?php

$errores = $errores ?? [];
$datosFormulario = $datosFormulario ?? [];

function escapar(string $valor): string
{
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

$nombre = escapar($datosFormulario['nombre'] ?? '');
$correo = escapar($datosFormulario['correo'] ?? '');
$telefono = escapar($datosFormulario['telefono'] ?? '');
$asunto = escapar($datosFormulario['asunto'] ?? '');
$mensaje = escapar($datosFormulario['mensaje'] ?? '');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contacto - LearnWeb Academy</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contacto.css">
</head>

<body>

    <nav>
        <div class="logo">
            <img src="images/logoo.png" alt="Logo de LearnWeb Academy">

            <h2>LearnWeb Academy</h2>
        </div>

        <div class="menu">
            <a href="index.php?controller=index&action=index">
                Inicio
            </a>

            <a href="index.php?controller=cursos&action=index">
                Cursos
            </a>

            <a href="index.php?controller=profesores&action=index">
                Profesores
            </a>

            <a
                class="activo"
                href="index.php?controller=contacto&action=index"
            >
                Contacto
            </a>
        </div>
    </nav>

    <section class="encabezado-contacto">
        <h1>Contacto</h1>

        <p>
            Comunícate con LearnWeb Academy para recibir más información
            sobre nuestros cursos y servicios.
        </p>
    </section>

    <section class="contacto">

        <div class="formulario-contacto">

            <h2>Envíanos un mensaje</h2>

            <?php if (($_GET['estado'] ?? '') === 'exito'): ?>
                <div id="mensajeExito">
                    Mensaje enviado correctamente.
                </div>
            <?php endif; ?>

            <?php if (isset($errores['general'])): ?>
                <div class="error">
                    <?= escapar($errores['general']) ?>
                </div>
            <?php endif; ?>

            <form
                id="formularioContacto"
                method="POST"
                action="index.php?controller=contacto&action=store"
                novalidate
            >

                <label for="nombre">Nombre completo</label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?= $nombre ?>"
                >

                <span id="errorNombre" class="error">
                    <?= escapar($errores['nombre'] ?? '') ?>
                </span>

                <label for="correo">Correo electrónico</label>

                <input
                    type="email"
                    id="correo"
                    name="correo"
                    value="<?= $correo ?>"
                >

                <span id="errorCorreo" class="error">
                    <?= escapar($errores['correo'] ?? '') ?>
                </span>

                <label for="telefono">Teléfono</label>

                <input
                    type="tel"
                    id="telefono"
                    name="telefono"
                    value="<?= $telefono ?>"
                >

                <span id="errorTelefono" class="error">
                    <?= escapar($errores['telefono'] ?? '') ?>
                </span>

                <label for="asunto">Asunto</label>

                <input
                    type="text"
                    id="asunto"
                    name="asunto"
                    value="<?= $asunto ?>"
                >

                <span id="errorAsunto" class="error">
                    <?= escapar($errores['asunto'] ?? '') ?>
                </span>

                <label for="mensaje">Mensaje</label>

                <textarea
                    id="mensaje"
                    name="mensaje"
                    rows="6"
                ><?= $mensaje ?></textarea>

                <span id="errorMensaje" class="error">
                    <?= escapar($errores['mensaje'] ?? '') ?>
                </span>

                <button type="submit" id="btnEnviar" disabled>
                    Enviar
                </button>

            </form>

        </div>

        <div class="informacion-contacto">

            <h2>Información de contacto</h2>

            <p>
                <strong>Dirección:</strong>
                San José, Costa Rica
            </p>

            <p>
                <strong>Teléfono:</strong>
                +506 2222-3333
            </p>

            <p>
                <strong>Correo:</strong>
                info@learnwebacademy.com
            </p>

        </div>

    </section>

    <section class="ubicacion">

        <h2>Ubicación</h2>

        <iframe
            src="https://www.google.com/maps?q=San%20Jose%20Costa%20Rica&output=embed"
            title="Ubicación de LearnWeb Academy"
            allowfullscreen
            loading="lazy"
        >
        </iframe>

    </section>

    <footer>
        <p>LearnWeb Academy | Todos los derechos reservados</p>
        <p>Instagram | Facebook | YouTube</p>
    </footer>

    <script src="contacto.js"></script>

</body>

</html>