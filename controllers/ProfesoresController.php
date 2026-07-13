<?php

require_once __DIR__ . '/../models/ProfesorModel.php';

class ProfesoresController
{
    

    public function index()
    {

        $model = new ProfesorModel();

        $profesores = $model->getAll();

        require "views/profesores/index.php";

    }

    public function show()
    {

        $model = new ProfesorModel();

        $profesor = $model->getById($_GET["id"]);

        require "views/profesores/show.php";

    }

}
