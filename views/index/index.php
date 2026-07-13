<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LearnWeb Academy</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="index.css">

</head>


<body>


<nav>

    <div class="logo">

        <img src="images/logoo.png" alt="Logo">

        <h2>LearnWeb Academy</h2>

    </div>


    <div class="menu">

        <a class="activo" href="index.php">Inicio</a>

        <a href="cursos.php">Cursos</a>

        <a href="profesores.php">Profesores</a>

        <a href="contacto.php">Contacto</a>

    </div>

</nav>



<section class="inicio">


    <div class="inicio-texto">

        <h1>
            Aprende tecnología con nosotros
        </h1>


        <p>
            Desarrolla habilidades en programación,
            diseño y marketing digital.
        </p>


        <button>
            Ver Cursos
        </button>


    </div>


    <div class="inicio-imagen">

        <img src="images/sistemas-web.jpg"
             alt="Estudiantes">

    </div>


</section>





<section class="cursos">


<h2>
Cursos Destacados
</h2>



<div class="contenedor-cursos">



<?php foreach($cursos as $curso): ?>



    <div class="tarjeta">


        <img src="images/web.jpg" 
             alt="<?= $curso['nombre'] ?>">



        <h3>
            <?= $curso['nombre']; ?>
        </h3>



        <p>
            <?= $curso['descripcion']; ?>
        </p>



        <p>
            <strong>Categoría:</strong>
            <?= $curso['categoria']; ?>
        </p>



        <p>
            <strong>Precio:</strong>
            $<?= $curso['precio']; ?>
        </p>



        <?php if($curso['disponible']): ?>


            <button>
                Ver más
            </button>


        <?php else: ?>


            <button disabled>
                No disponible
            </button>


        <?php endif; ?>



    </div>



<?php endforeach; ?>



</div>


</section>






<section class="estadisticas">


<div class="dato">

<h2>1200+</h2>

<p>Estudiantes</p>

</div>


<div class="dato">

<h2>35</h2>

<p>Profesores</p>

</div>


<div class="dato">

<h2>50</h2>

<p>Cursos</p>

</div>


</section>






<section class="testimonios">


<h2>
Testimonios
</h2>


<div class="contenedor-testimonios">


<div class="testimonio">

<p>
"Excelente academia y muy buenos profesores"
</p>

<h4>
Maria Lopez
</h4>

</div>



<div class="testimonio">

<p>
"Aprendi mucho en poco tiempo"
</p>

<h4>
Carlos Ramirez
</h4>

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