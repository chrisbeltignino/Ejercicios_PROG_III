"use strict";
var Prueba;
(function (Prueba) {
    class Persona {
        constructor(apellido, nombre) {
            this._apellido = apellido;
            this._nombre = nombre;
        }
        get apellido() {
            return this._apellido;
        }
        set apellido(apellido) {
            this._apellido = apellido;
        }
        get nombre() {
            return this._nombre;
        }
        set nombre(nombre) {
            this._nombre = nombre;
        }
        ToString() {
            return `${this._apellido}, ${this._nombre}`;
        }
    }
    Prueba.Persona = Persona;
})(Prueba || (Prueba = {}));
