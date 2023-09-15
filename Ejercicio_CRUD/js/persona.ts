namespace Prueba {
    export class Persona {
        protected _apellido: string;
        protected _nombre: string;

        constructor(apellido: string, nombre: string) {
        this._apellido = apellido;
        this._nombre = nombre;
        }

        get apellido(): string {
        return this._apellido;
        }

        set apellido(apellido: string) {
        this._apellido = apellido;
        }

        get nombre(): string {
        return this._nombre;
        }

        set nombre(nombre: string) {
        this._nombre = nombre;
        }

        ToString(): string {
        return `${this._apellido}, ${this._nombre}`;
        }
    }
}