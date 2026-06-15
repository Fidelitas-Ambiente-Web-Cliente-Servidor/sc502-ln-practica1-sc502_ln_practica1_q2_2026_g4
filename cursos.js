

// LearnWeb Academy — Tarea #2


// Array de cursos con minimo 6 objetos
let cursos = [
    {
        nombre: "HTML y CSS",
        descripcion: "Aprende a crear sitios web modernos desde cero.",
        categoria: "Desarrollo Web",
        duracion: "10 semanas",
        precio: "$120",
        imagen: "images/desarrolloweb.jpg"
    },
    {
        nombre: "JavaScript Básico",
        descripcion: "Domina la programación del lado del cliente.",
        categoria: "Desarrollo Web",
        duracion: "10 semanas",
        precio: "$150",
        imagen: "images/javascript.png"
    },
    {
        nombre: "Frontend Profesional",
        descripcion: "Construye interfaces modernas y responsivas.",
        categoria: "Desarrollo Web",
        duracion: "12 semanas",
        precio: "$180",
        imagen: "images/frontend.png"
    },
    {
        nombre: "Diseño UX/UI",
        descripcion: "Diseña experiencias atractivas para el mercado laboral.",
        categoria: "Diseño",
        duracion: "8 semanas",
        precio: "$130",
        imagen: "images/disenoux.jpg"
    },
    {
        nombre: "Marketing Digital",
        descripcion: "Aprende estrategias para redes sociales y campañas de publicidad.",
        categoria: "Marketing",
        duracion: "7 semanas",
        precio: "$110",
        imagen: "images/marketing.jpg"
    },
    {
        nombre: "SEO y Posicionamiento",
        descripcion: "Mejora la visibilidad de sitios web en buscadores.",
        categoria: "Marketing",
        duracion: "7 semanas",
        precio: "$110",
        imagen: "images/seo.jpg"
    }
];


// Variable global para guardar la categoria activa actualmente
let categoriaActiva = "Todas";

// Funcion que crea una tarjeta de curso y la agrego al contenedor
// Recibe un objeto curso
function crearTarjeta(curso) {
    let contenedor = document.getElementById("contenedor-cursos");

    // Div principal de la tarjeta
    let tarjeta = document.createElement("div");
    tarjeta.classList.add("curso");

    // Crear y configurar la imagen
    let imagen = document.createElement("img");
    imagen.src = curso.imagen;
    imagen.alt = curso.nombre;

    // Crear el titulo 
    let titulo = document.createElement("h3");
    titulo.innerText = curso.nombre;

    // Crear el badge de categoria
    let categoria = document.createElement("span");
    categoria.innerText = curso.categoria;

    // Descripcion
    let descripcion = document.createElement("p");
    descripcion.innerText = curso.descripcion;

    // Duracion con texto en negrita
    let duracion = document.createElement("p");
    duracion.innerHTML = "<strong>Duración:</strong> " + curso.duracion;

    // Precio con texto en negrita
    let precio = document.createElement("p");
    precio.innerHTML = "<strong>Precio:</strong> " + curso.precio;

    // Agregar todos los elementos dentro de la tarjeta
    tarjeta.appendChild(imagen);
    tarjeta.appendChild(titulo);
    tarjeta.appendChild(categoria);
    tarjeta.appendChild(descripcion);
    tarjeta.appendChild(duracion);
    tarjeta.appendChild(precio);

    // Agregar la tarjeta al contenedor
    contenedor.appendChild(tarjeta);
}

// Funcion para filtrar los cursos segun el texto de busqueda y la categoria activa y luego los renderizamos en DOM 
function mostrarCursos() {
    let contenedor = document.getElementById("contenedor-cursos");
    let mensajeVacio = document.getElementById("mensaje-vacio");
    let textoBusqueda = document.getElementById("busqueda").value;

    // Limpiar el contenedor antes de volver a pintar/ejecutar
    contenedor.innerHTML = "";

    // Filtrar el array usando filter() con ambas condiciones al mismo tiempo
    let cursosFiltrados = cursos.filter(function (curso) {
        // Condicion 1: el texto aparece en el nombre o en la descripcion
        let coincideTexto =
            curso.nombre.toLowerCase().includes(textoBusqueda.toLowerCase()) ||
            curso.descripcion.toLowerCase().includes(textoBusqueda.toLowerCase());

        // Condicion 2: la categoria coincide o se selecciono "Todas"
        let coincideCategoria =
            categoriaActiva === "Todas" || curso.categoria === categoriaActiva;

        // Ambas condiciones deben cumplirse
        return coincideTexto && coincideCategoria;
    });

    // Si no hay resultados, mostrar mensaje; si hay, pintar las tarjetas
    if (cursosFiltrados.length === 0) {
        mensajeVacio.innerText = "No se encontraron cursos con esa búsqueda.";
    } else {
        mensajeVacio.innerText = "";

        // Recorrer los cursos filtrados con forEach y crear cada tarjeta
        cursosFiltrados.forEach(function (curso) {
            crearTarjeta(curso);
        });
    }
}

// Funcion que actualiza el estilo visual del boton de categoria activo
function actualizarBotones() {
    let botones = document.querySelectorAll(".btn-categoria");

    botones.forEach(function (boton) {
        // Si el data-categoria del boton coincide con la activa, agregar esto a la clase activo
        if (boton.dataset.categoria === categoriaActiva) {
            boton.classList.add("activo");
        } else {
            boton.classList.remove("activo");
        }
    });
}

// Esperar a que el DOM este completamente cargado antes de ejecutar el codigo
document.addEventListener("DOMContentLoaded", function () {

    // Evento de busqueda en tiempo real: se activa cada vez que el usuario escribe
    let inputBusqueda = document.getElementById("busqueda");
    inputBusqueda.addEventListener("input", function () {
        mostrarCursos();
    });

    // Evento de filtrado por categoria: se agrega a cada boton
    let botones = document.querySelectorAll(".btn-categoria");
    botones.forEach(function (boton) {
        boton.addEventListener("click", function () {
            // Leer la categoria del atributo data-categoria del boton clickeado
            categoriaActiva = boton.dataset.categoria;
            actualizarBotones();
            mostrarCursos();
        });
    });

    // Renderizar todos los cursos al cargar la pagina por primera vez
    mostrarCursos();

});