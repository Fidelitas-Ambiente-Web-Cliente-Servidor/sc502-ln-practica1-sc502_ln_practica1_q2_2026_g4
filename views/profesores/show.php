<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $profesor["nombre"] ?> | LearnWeb Academy</title>

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

        <a href="?controller=profesores&action=index">
            Profesores
        </a>

        <a href="contacto.php">
            Contacto
        </a>

    </div>

</nav>



<section class="detalle-profesor">


    <div class="tarjeta-detalle">


        <img 
            src="<?= $profesor["foto"] ?>" 
            alt="<?= $profesor["nombre"] ?>"
        >


        <div class="informacion-profesor">


            <h1>
                <?= $profesor["nombre"] ?>
            </h1>


            <h3>
                <?= $profesor["especialidad"] ?>
            </h3>


            <p>
                <?= $profesor["bio"] ?>
            </p>


            <?php if(isset($profesor["correo"])): ?>

                <p>
                    <strong>Correo:</strong>
                    <?= $profesor["correo"] ?>
                </p>

            <?php endif; ?>


            <a 
                class="btn btn-primary"
                href="?controller=profesores&action=index"
            >
                Volver a profesores
            </a>


        </div>


    </div>


</section>



<footer>

    <p>
        LearnWeb Academy | Todos los derechos reservados
    </p>

    <p>
        Instagram | Facebook | YouTube
    </p>

</footer>


</body>

</html>