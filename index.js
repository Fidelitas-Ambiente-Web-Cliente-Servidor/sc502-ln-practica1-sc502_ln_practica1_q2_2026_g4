/*
let cursos = [
    {
        nombre: "Desarrollo Web",
        descripcion: "Aprende HTML y CSS desde cero.",
        imagen: "./images/web.jpg",
        categoria: "Programacion"
    },
    {
        nombre: "Diseño UX/UI",
        descripcion: "Diseña interfaces modernas y atractivas.",
        imagen: "./images/disenoux.jpg",
        categoria: "Diseño"
    },
    {
        nombre: "Marketing Digital",
        descripcion: "Aprende estrategias digitales para negocios.",
        imagen: "./images/marketing.jpg",
        categoria: "Marketing"
    }
];

function crearTarjeta(curso) {

    let contenedor = document.querySelector(".contenedor-cursos");

    let tarjeta = document.createElement("div");
    tarjeta.classList.add("tarjeta");

    let imagen = document.createElement("img");
    imagen.src = curso.imagen;
    imagen.alt = curso.nombre;

    let titulo = document.createElement("h3");
    titulo.innerText = curso.nombre;

    let descripcion = document.createElement("p");
    descripcion.innerText = curso.descripcion;

    let categoria = document.createElement("p");
    categoria.innerHTML = "<strong>Categoria:</strong> " + curso.categoria;

    let boton = document.createElement("button");
    boton.innerText = "Ver mas";

    tarjeta.appendChild(imagen);
    tarjeta.appendChild(titulo);
    tarjeta.appendChild(descripcion);
    tarjeta.appendChild(categoria);
    tarjeta.appendChild(boton);

    contenedor.appendChild(tarjeta);
}

function mostrarCursos() {

    cursos.forEach(function(curso) {

        crearTarjeta(curso);

    });
}

document.addEventListener("DOMContentLoaded", function() {

    mostrarCursos();

});
*/