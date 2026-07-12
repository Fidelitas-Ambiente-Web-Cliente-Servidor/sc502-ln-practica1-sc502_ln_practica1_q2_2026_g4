CREATE DATABASE IF NOT EXISTS learnweb_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE learnweb_db;

CREATE TABLE IF NOT EXISTS contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(150) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    asunto VARCHAR(150) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contacto (nombre, correo, telefono, asunto, mensaje)
VALUES
(
    'María Rodríguez',
    'maria.rodriguez@example.com',
    '88881111',
    'Información de cursos',
    'Deseo recibir más información sobre los cursos disponibles.'
),
(
    'Carlos Hernández',
    'carlos.hernandez@example.com',
    '88882222',
    'Horarios disponibles',
    'Quisiera conocer los horarios disponibles para los cursos virtuales.'
),
(
    'Ana Martínez',
    'ana.martinez@example.com',
    '88883333',
    'Proceso de matrícula',
    'Necesito información sobre el proceso de matrícula y los requisitos.'
),
(
    'José Ramírez',
    'jose.ramirez@example.com',
    '88884444',
    'Métodos de pago',
    'Deseo consultar cuáles métodos de pago acepta la academia.'
),
(
    'Laura Sánchez',
    'laura.sanchez@example.com',
    '88885555',
    'Certificaciones',
    'Quisiera saber si los cursos incluyen una certificación al finalizar.'
);