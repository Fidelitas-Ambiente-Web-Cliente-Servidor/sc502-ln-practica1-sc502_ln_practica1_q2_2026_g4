// Referencias a los elementos del formulario

const formulario = document.getElementById("formularioContacto");

const nombre = document.getElementById("nombre");
const correo = document.getElementById("correo");
const telefono = document.getElementById("telefono");
const asunto = document.getElementById("asunto");
const mensaje = document.getElementById("mensaje");

const btnEnviar = document.getElementById("btnEnviar");

const errorNombre = document.getElementById("errorNombre");
const errorCorreo = document.getElementById("errorCorreo");
const errorTelefono = document.getElementById("errorTelefono");
const errorAsunto = document.getElementById("errorAsunto");
const errorMensaje = document.getElementById("errorMensaje");

const mensajeExito = document.getElementById("mensajeExito");


// Valida que el nombre tenga mínimo 5 caracteres y solo letras o espacios

function validarNombre() {

    const regexNombre = /^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/;

    if (nombre.value.trim().length < 5) {
        errorNombre.textContent = "El nombre debe tener mínimo 5 caracteres.";
        return false;
    }

    if (!regexNombre.test(nombre.value.trim())) {
        errorNombre.textContent = "El nombre solo puede contener letras y espacios.";
        return false;
    }

    errorNombre.textContent = "";
    return true;
}


// Valida el formato del correo electrónico usando expresión regular

function validarCorreo() {

    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexCorreo.test(correo.value.trim())) {
        errorCorreo.textContent = "Ingrese un correo electrónico válido.";
        return false;
    }

    errorCorreo.textContent = "";
    return true;
}


// Valida que el teléfono tenga solo números y mínimo 8 dígitos

function validarTelefono() {

    const regexTelefono = /^[0-9]+$/;

    if (!regexTelefono.test(telefono.value.trim())) {
        errorTelefono.textContent = "El teléfono solo puede contener números.";
        return false;
    }

    if (telefono.value.trim().length < 8) {
        errorTelefono.textContent = "El teléfono debe tener mínimo 8 dígitos.";
        return false;
    }

    errorTelefono.textContent = "";
    return true;
}


// Valida que el asunto tenga mínimo 3 caracteres

function validarAsunto() {

    if (asunto.value.trim().length < 3) {
        errorAsunto.textContent = "El asunto debe tener mínimo 3 caracteres.";
        return false;
    }

    errorAsunto.textContent = "";
    return true;
}


// Valida que el mensaje tenga mínimo 20 caracteres

function validarMensaje() {

    if (mensaje.value.trim().length < 20) {
        errorMensaje.textContent = "El mensaje debe tener mínimo 20 caracteres.";
        return false;
    }

    errorMensaje.textContent = "";
    return true;
}


// Revisa si todos los campos son válidos para activar o desactivar el botón

function revisarFormulario() {

    const formularioValido =
        validarNombre() &&
        validarCorreo() &&
        validarTelefono() &&
        validarAsunto() &&
        validarMensaje();

    btnEnviar.disabled = !formularioValido;
}


// Eventos para validar en tiempo real mientras el usuario escribe

nombre.addEventListener("input", revisarFormulario);
correo.addEventListener("input", revisarFormulario);
telefono.addEventListener("input", revisarFormulario);
asunto.addEventListener("input", revisarFormulario);
mensaje.addEventListener("input", revisarFormulario);


// Evento de envío del formulario

/*
Código utilizado en la Tarea 2 para simular el envío del formulario.

formulario.addEventListener("submit", function (evento) {

    evento.preventDefault();

    if (btnEnviar.disabled) {
        return;
    }

    mensajeExito.textContent = "Mensaje enviado correctamente.";

    formulario.reset();

    btnEnviar.disabled = true;
});
*/


// Validación antes de enviar los datos al controlador PHP

formulario.addEventListener("submit", function (evento) {

    const formularioValido = [
        validarNombre(),
        validarCorreo(),
        validarTelefono(),
        validarAsunto(),
        validarMensaje()
    ].every(Boolean);

    if (!formularioValido) {
        evento.preventDefault();
        btnEnviar.disabled = true;
    }
});