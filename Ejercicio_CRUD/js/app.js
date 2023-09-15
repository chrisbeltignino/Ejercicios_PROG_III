var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Prueba;
(function (Prueba) {
    var Persona = /** @class */ (function () {
        function Persona(apellido, nombre) {
            this._apellido = apellido;
            this._nombre = nombre;
        }
        Object.defineProperty(Persona.prototype, "apellido", {
            get: function () {
                return this._apellido;
            },
            set: function (apellido) {
                this._apellido = apellido;
            },
            enumerable: false,
            configurable: true
        });
        Object.defineProperty(Persona.prototype, "nombre", {
            get: function () {
                return this._nombre;
            },
            set: function (nombre) {
                this._nombre = nombre;
            },
            enumerable: false,
            configurable: true
        });
        Persona.prototype.ToString = function () {
            return "".concat(this._apellido, ", ").concat(this._nombre);
        };
        return Persona;
    }());
    Prueba.Persona = Persona;
})(Prueba || (Prueba = {}));
/// <reference path="./persona.ts" />
var Prueba;
(function (Prueba) {
    var Alumno = /** @class */ (function (_super) {
        __extends(Alumno, _super);
        function Alumno(apellido, nombre, legajo) {
            var _this = _super.call(this, apellido, nombre) || this;
            _this._legajo = legajo;
            return _this;
        }
        Object.defineProperty(Alumno.prototype, "legajo", {
            get: function () {
                return this._legajo;
            },
            set: function (legajo) {
                this._legajo = legajo;
            },
            enumerable: false,
            configurable: true
        });
        Alumno.prototype.ToString = function () {
            return "".concat(_super.prototype.ToString.call(this), " - Legajo: ").concat(this._legajo);
        };
        return Alumno;
    }(Prueba.Persona));
    Prueba.Alumno = Alumno;
})(Prueba || (Prueba = {}));
var Manejador;
(function (Manejador) {
    function CrearAlumno() {
        var apellido = document.getElementById('apellido').value;
        var nombre = document.getElementById('nombre').value;
        var legajo = Number(document.getElementById('legajo').value);
        var nuevoAlumno = new Prueba.Alumno(apellido, nombre, legajo);
        // Mostrar por consola
        console.log(nuevoAlumno.ToString());
        // Mostrar por alert
        alert(nuevoAlumno.ToString());
    }
    Manejador.CrearAlumno = CrearAlumno;
})(Manejador || (Manejador = {}));
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
    var alumnos = [new Prueba.Alumno("Porcel", "Rodrigo", 124123),
        new Prueba.Alumno("Varela", "Brian", 23442),
        new Prueba.Alumno("Fagundez", "Nicolas", 234234),
        new Prueba.Alumno("Rocabado", "Betangas", 95434)];
    // Mostrar por consola
    for (var _i = 0, alumnos_1 = alumnos; _i < alumnos_1.length; _i++) {
        var alumno = alumnos_1[_i];
        console.log(alumno.ToString());
    }
    // Mostrar alumnos en la tabla
    function mostrarAlumnosEnTabla() {
        var tabla = document.querySelector('table');
        if (!tabla) {
            console.error("No se encontró la tabla en el documento.");
            return;
        }
        var tbody = document.createElement('tbody');
        for (var _i = 0, alumnos_2 = alumnos; _i < alumnos_2.length; _i++) {
            var alumno = alumnos_2[_i];
            var row = document.createElement('tr');
            row.innerHTML = "\n            <td>".concat(alumno.apellido, "</td>\n            <td>").concat(alumno.nombre, "</td>\n            <td>").concat(alumno.legajo, "</td>\n            ");
            tbody.appendChild(row);
        }
        tabla.appendChild(tbody);
    }
    mostrarAlumnosEnTabla();
})(TestPrueba || (TestPrueba = {}));
