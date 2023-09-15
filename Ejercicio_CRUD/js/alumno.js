"use strict";
/// <reference path="./persona.ts" />
var Prueba;
(function (Prueba) {
    class Alumno extends Prueba.Persona {
        constructor(apellido, nombre, legajo) {
            super(apellido, nombre);
            this._legajo = legajo;
        }
        get legajo() {
            return this._legajo;
        }
        set legajo(legajo) {
            this._legajo = legajo;
        }
        ToString() {
            return `${super.ToString()} - Legajo: ${this._legajo}`;
        }
    }
    Prueba.Alumno = Alumno;
})(Prueba || (Prueba = {}));
