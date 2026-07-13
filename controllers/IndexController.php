<?php

require_once __DIR__ . '/../models/IndexModel.php';

class IndexController
{
    public function index()
    {
        $modelo = new IndexModel();

        $cursos = $modelo->getAll();

        require_once __DIR__ . "/../views/index/index.php";
    }
}