/// <reference path="./persona.ts" />

namespace Prueba {
    export class Alumno extends Persona {
        protected _legajo: number;

        constructor(apellido: string, nombre: string, legajo: number) {
            super(apellido, nombre);
            this._legajo = legajo;
        }

        get legajo(): number {
            return this._legajo;
        }

        set legajo(legajo: number) {
            this._legajo = legajo;
        }

        ToString(): string {
            return `${super.ToString()} - Legajo: ${this._legajo}`;
        }
    }
}