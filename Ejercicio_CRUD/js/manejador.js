"use strict";
var Manejador;
(function (Manejador) {
    function CrearAlumno() {
        const apellido = document.getElementById('apellido').value;
        const nombre = document.getElementById('nombre').value;
        const legajo = Number(document.getElementById('legajo').value);
        const nuevoAlumno = new Prueba.Alumno(apellido, nombre, legajo);
        // Mostrar por consola
        console.log(nuevoAlumno.ToString());
        // Mostrar por alert
        alert(nuevoAlumno.ToString());
    }
    Manejador.CrearAlumno = CrearAlumno;
})(Manejador || (Manejador = {}));
