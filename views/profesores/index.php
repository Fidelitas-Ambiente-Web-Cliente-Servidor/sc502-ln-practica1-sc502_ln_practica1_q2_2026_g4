<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profesores | LearnWeb Academy</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profesores.css">

</head>

<body>

<nav>

    <div class="logo">

        <img src="images/logoo.png" alt="Logo">

        <h2>LearnWeb Academy</h2>

    </div>

    <div class="menu">

        <a href="index.php">Inicio</a>
        <a href="cursos.php">Cursos</a>
        <a class="activo" href="?controller=profesores&action=index">
            Profesores
        </a>
        <a href="contacto.php">Contacto</a>

    </div>

</nav>


<section class="encabezado-profesores">

    <h1>Equipo de Profesores</h1>

    <p>
        Conoce a nuestros especialistas en tecnología,
        diseño y marketing digital.
    </p>

</section>


<section class="profesores">

    <div class="contenedor-profesores">

        <?php foreach($profesores as $profesor): ?>

            <div class="profesor">

                <img src="<?= $profesor['foto'] ?>" 
                     alt="<?= $profesor['nombre'] ?>">

                <h3>
                    <?= $profesor['nombre'] ?>
                </h3>

                <h4>
                    <?= $profesor['especialidad'] ?>
                </h4>

                <p>
                    <?= $profesor['bio'] ?>
                </p>


                <a class="btn btn-primary"
                   href="?controller=profesores&action=show&id=<?= $profesor['id'] ?>">
                    Ver detalle
                </a>

            </div>

        <?php endforeach; ?>

    </div>

</section>


<section class="mision-vision">

    <div class="bloque">

        <h2>Misión</h2>

        <p>
            Brindar educación tecnológica de calidad,
            desarrollando profesionales preparados para
            los retos del mundo digital.
        </p>

    </div>


    <div class="bloque">

        <h2>Visión</h2>

        <p>
            Ser una academia líder en formación tecnológica,
            reconocida por la excelencia de sus programas y docentes.
        </p>

    </div>

</section>


<footer>

    <p>LearnWeb Academy | Todos los derechos reservados</p>

    <p>
        Instagram | Facebook | YouTube
    </p>

</footer>


</body>

</html>