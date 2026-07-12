<?php

require_once __DIR__ . '/../models/ContactoModel.php';

class ContactoController
{
    private ContactoModel $model;
    public function __construct()
    {
        $this->model = new ContactoModel();
    }
    public function index(): void
    {
        $errores = [];
        $datosFormulario = [];

        require __DIR__ . '/../views/contacto/index.php';
    }
    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=contacto&action=index');
            exit;
        }

        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $asunto = trim($_POST['asunto'] ?? '');
        $mensaje = trim($_POST['mensaje'] ?? '');

        $errores = [];

        if (strlen($nombre) < 5) {
            $errores['nombre'] = 'El nombre debe tener mínimo 5 caracteres.';
        }

        if (!preg_match('/^[\p{L}\s]+$/u', $nombre)) {
            $errores['nombre'] = 'El nombre solo puede contener letras y espacios.';
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores['correo'] = 'Ingrese un correo electrónico válido.';
        }

        if (!preg_match('/^[0-9]{8,20}$/', $telefono)) {
            $errores['telefono'] = 'El teléfono debe contener entre 8 y 20 números.';
        }

        if (strlen($asunto) < 3) {
            $errores['asunto'] = 'El asunto debe tener mínimo 3 caracteres.';
        }

        if (strlen($mensaje) < 20) {
            $errores['mensaje'] = 'El mensaje debe tener mínimo 20 caracteres.';
        }

        $datosFormulario = [
            'nombre' => $nombre,
            'correo' => $correo,
            'telefono' => $telefono,
            'asunto' => $asunto,
            'mensaje' => $mensaje
        ];

        if (!empty($errores)) {
            require __DIR__ . '/../views/contacto/index.php';
            return;
        }

        try {
            $this->model->create(
                $nombre,
                $correo,
                $telefono,
                $asunto,
                $mensaje
            );

            header(
                'Location: index.php?controller=contacto&action=index&estado=exito'
            );
            exit;
        } catch (Throwable $error) {
            $errores['general'] =
                'No fue posible enviar el mensaje. Intente nuevamente.';

            require __DIR__ . '/../views/contacto/index.php';
        }
    }
}