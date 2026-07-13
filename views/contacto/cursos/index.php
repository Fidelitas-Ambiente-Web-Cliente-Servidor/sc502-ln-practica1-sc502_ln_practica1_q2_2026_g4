<?php

$cursos = $cursos ?? [];
$categorias = $categorias ?? [];
$categoriaActiva = $categoriaActiva ?? 'Todas';

function escapar(string $valor): string
{
    return htmlspecialchars($valor, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cursos - LearnWeb Academy</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cursos.css">
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

            <a
                class="activo"
                href="index.php?controller=cursos&action=index"
            >
                Cursos
            </a>

            <a href="index.php?controller=profesores&action=index">
                Profesores
            </a>

            <a href="index.php?controller=contacto&action=index">
                Contacto
            </a>
        </div>
    </nav>

    <section class="encabezado-cursos">
        <h1>Catálogo de Cursos</h1>

        <p>
            Programas especializados en desarrollo web,
            diseño digital y marketing.
        </p>
    </section>

    <section class="categoria">

        <form
            class="filtros-categoria"
            method="GET"
            action="index.php"
        >
            <input type="hidden" name="controller" value="cursos">
            <input type="hidden" name="action" value="index">

            <label for="categoria" class="etiqueta-filtro">
                Filtrar por categoría:
            </label>

            <select id="categoria" name="categoria">
                <?php foreach ($categorias as $categoria): ?>
                    <option
                        value="<?= escapar($categoria) ?>"
                        <?= $categoria === $categoriaActiva ? 'selected' : '' ?>
                    >
                        <?= escapar($categoria) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn-filtrar">
                Filtrar
            </button>
        </form>

        <?php if (empty($cursos)): ?>
            <p id="mensaje-vacio">
                No se encontraron cursos para esta categoría.
            </p>
        <?php else: ?>
            <div class="contenedor-cursos" id="contenedor-cursos">
                <?php foreach ($cursos as $curso): ?>
                    <div class="curso">
                        <img
                            src="<?= escapar($curso['imagen']) ?>"
                            alt="<?= escapar($curso['nombre']) ?>"
                        >

                        <h3><?= escapar($curso['nombre']) ?></h3>

                        <span><?= escapar($curso['categoria']) ?></span>

                        <p><?= escapar($curso['descripcion']) ?></p>

                        <p>
                            <strong>Duración:</strong>
                            <?= escapar($curso['duracion']) ?>
                        </p>

                        <p>
                            <strong>Precio:</strong>
                            <?= escapar($curso['precio']) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </section>

    <footer>
        <p>LearnWeb Academy</p>
        <p>Instagram | Facebook | YouTube</p>
    </footer>

    <script src="cursos.js"></script>

</body>

</html>
