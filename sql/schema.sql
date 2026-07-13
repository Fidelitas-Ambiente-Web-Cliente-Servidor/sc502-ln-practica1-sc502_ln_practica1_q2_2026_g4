CREATE DATABASE IF NOT EXISTS learnweb_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE learnweb_db;


CREATE TABLE IF NOT EXISTS cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    duracion VARCHAR(50) NOT NULL,
    precio VARCHAR(20) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO cursos (nombre, descripcion, categoria, duracion, precio, imagen)
VALUES
(
    'HTML y CSS',
    'Aprende a crear sitios web modernos desde cero.',
    'Desarrollo Web',
    '10 semanas',
    '$120',
    'images/desarrolloweb.jpg'
),
(
    'JavaScript Básico',
    'Domina la programación del lado del cliente.',
    'Desarrollo Web',
    '10 semanas',
    '$150',
    'images/javascript.png'
),
(
    'Frontend Profesional',
    'Construye interfaces modernas y responsivas.',
    'Desarrollo Web',
    '12 semanas',
    '$180',
    'images/frontend.png'
),
(
    'Diseño UX/UI',
    'Diseña experiencias atractivas para el mercado laboral.',
    'Diseño',
    '8 semanas',
    '$130',
    'images/disenoux.jpg'
),
(
    'Marketing Digital',
    'Aprende estrategias para redes sociales y campañas de publicidad.',
    'Marketing',
    '7 semanas',
    '$110',
    'images/marketing.jpg'
),
(
    'SEO y Posicionamiento',
    'Mejora la visibilidad de sitios web en buscadores.',
    'Marketing',
    '7 semanas',
    '$110',
    'images/seo.jpg'
);

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

CREATE TABLE IF NOT EXISTS profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    bio TEXT NOT NULL,
    foto VARCHAR(255),
    activo TINYINT(1) DEFAULT 1
);
INSERT INTO profesores(nombre, especialidad, bio, foto, activo)
VALUES
('Ana Rodríguez',
'Desarrollo Web',
'Especialista en HTML, CSS y JavaScript con más de 10 años de experiencia.',
'images/profesor1.jpg',
1),

('Carlos Méndez',
'Diseño UX/UI',
'Experto en diseño de interfaces y experiencia de usuario.',
'images/profesor2.jpg',
1),

('Laura Sánchez',
'Marketing Digital',
'Especialista en redes sociales y SEO.',
'images/profesor3.jpg',
1),

('David Vargas',
'Programación Java',
'Desarrollador de software empresarial.',
'images/profesor4.jpg',
1),

('María Solís',
'Bases de Datos',
'Especialista en MySQL y PostgreSQL.',
'images/profesor5.jpg',
1);