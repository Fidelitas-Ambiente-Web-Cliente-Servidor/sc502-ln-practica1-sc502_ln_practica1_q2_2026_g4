<?php

require_once __DIR__ . '/../models/CursoModel.php';

class CursosController
{
    private CursoModel $model;

    /**
     * Categorias para el filtro. */
    private const CATEGORIAS = [
        'Todas',
        'Desarrollo Web',
        'Diseño',
        'Marketing'
    ];

    public function __construct()
    {
        $this->model = new CursoModel();
    }

    public function index(): void
    {
        $categoriaActiva = trim($_GET['categoria'] ?? 'Todas');

        if (!in_array($categoriaActiva, self::CATEGORIAS, true)) {
            $categoriaActiva = 'Todas';
        }

        if ($categoriaActiva === 'Todas') {
            $cursos = $this->model->getAll();
        } else {
            $cursos = $this->model->getByCategoria($categoriaActiva);
        }

        $categorias = self::CATEGORIAS;

        require __DIR__ . '/../views/cursos/index.php';
    }
}
