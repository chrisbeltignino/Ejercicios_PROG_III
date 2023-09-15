"use strict";
/// <reference path="./persona.ts" />
/// <reference path="./alumno.ts" />
var TestPrueba;
(function (TestPrueba) {
    /*
    const alumnos: Prueba.Alumno[] = [];
  
    // Crear cuatro alumnos
    const alumno1 = new Prueba.Alumno('Porcel', 'Rodrigo', 101);
    const alumno2 = new Prueba.Alumno('Varela', 'Brian', 102);
    const alumno3 = new Prueba.Alumno('Fagundez', 'Nicolas', 103);
    const alumno4 = new Prueba.Alumno('Rocabado', 'Betangas', 104);

    alumnos.push(alumno1, alumno2, alumno3, alumno4);
    */
    let alumnos = [new Prueba.Alumno("Porcel", "Rodrigo", 124123),
        new Prueba.Alumno("Varela", "Brian", 23442),
        new Prueba.Alumno("Fagundez", "Nicolas", 234234),
        new Prueba.Alumno("Rocabado", "Betangas", 95434)];
    // Mostrar por consola
    for (const alumno of alumnos) {
        console.log(alumno.ToString());
    }
    // Mostrar alumnos en la tabla
    function mostrarAlumnosEnTabla() {
        const tabla = document.querySelector('table');
        if (!tabla) {
            console.error("No se encontró la tabla en el documento.");
            return;
        }
        const tbody = document.createElement('tbody');
        for (const alumno of alumnos) {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>${alumno.apellido}</td>
            <td>${alumno.nombre}</td>
            <td>${alumno.legajo}</td>
            `;
            tbody.appendChild(row);
        }
        tabla.appendChild(tbody);
    }
    mostrarAlumnosEnTabla();
})(TestPrueba || (TestPrueba = {}));
