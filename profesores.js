/*
let profesores = [
    {
        nombre: "Ana Rodriguez",
        especialidad: "Desarrollo Web",
        descripcion: "Especialista en HTML, CSS y JavaScript con más de 10 años de experiencia.",
        foto: "images/profesor1.jpg",
        correo: "ana@learnweb.com",
        cursosQueImparte: "HTML, CSS y JavaScript"
    },
    {
        nombre: "Carlos Mendez",
        especialidad: "Diseño UX/UI",
        descripcion: "Experto en diseño de interfaces y experiencia de usuario.",
        foto: "images/profesor2.jpg",
        correo: "carlos@learnweb.com",
        cursosQueImparte: "Diseño UX, Diseño UI y Figma"
    },
    {
        nombre: "Laura Sanchez",
        especialidad: "Marketing Digital",
        descripcion: "Especialista en redes sociales y estrategias de posicionamiento.",
        foto: "images/profesor3.jpg",
        correo: "laura@learnweb.com",
        cursosQueImparte: "Marketing Digital y SEO"
    },
    {
        nombre: "David Vargas",
        especialidad: "Programacion Java",
        descripcion: "Desarrollador de software con amplia experiencia en aplicaciones empresariales.",
        foto: "images/profesor4.jpg",
        correo: "david@learnweb.com",
        cursosQueImparte: "Java, Spring Boot y Bases de Datos"
    }
];

function crearTarjeta(profesor, indice) {

    let contenedor = document.querySelector(".contenedor-profesores");

    let tarjeta = document.createElement("div");
    tarjeta.classList.add("profesor");

    
    tarjeta.dataset.id = indice;

    tarjeta.innerHTML = `
        <img src="${profesor.foto}" alt="${profesor.nombre}">
        <h3>${profesor.nombre}</h3>
        <h4>${profesor.especialidad}</h4>
        <p>${profesor.descripcion}</p>
    `;

    contenedor.appendChild(tarjeta);
}


function mostrarProfesores() {

    let contenedor = document.querySelector(".contenedor-profesores");

    contenedor.innerHTML = "";

    profesores.forEach(function (profesor, indice) {
        crearTarjeta(profesor, indice);
    });
}

function abrirModal(idProfesor) {

    let profesor = profesores[idProfesor];

    document.getElementById("modalFoto").src = profesor.foto;
    document.getElementById("modalNombre").innerText = profesor.nombre;
    document.getElementById("modalEspecialidad").innerText = profesor.especialidad;
    document.getElementById("modalDescripcion").innerText = profesor.descripcion;
    document.getElementById("modalCorreo").innerText = profesor.correo;
    document.getElementById("modalCursos").innerText = profesor.cursosQueImparte;

    document.getElementById("modalProfesor").style.display = "block";
}


function cerrarModal() {

    document.getElementById("modalProfesor").style.display = "none";
}


document.addEventListener("DOMContentLoaded", function () {

    
    mostrarProfesores();

    
    
    document.addEventListener("click", function (event) {

        let tarjeta = event.target.closest(".profesor");

        if (tarjeta) {

            let idProfesor = tarjeta.dataset.id;

            abrirModal(idProfesor);
        }
    });

    
    document.querySelector(".cerrar").addEventListener("click", function () {

        cerrarModal();
    });

    
    window.addEventListener("click", function (event) {

        let modal = document.getElementById("modalProfesor");

        if (event.target === modal) {

            cerrarModal();
        }
    });

});
*/