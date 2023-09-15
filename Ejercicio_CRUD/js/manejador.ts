namespace Manejador {
    export function CrearAlumno(): void {
        const apellido = (document.getElementById('apellido') as HTMLInputElement).value;
        const nombre = (document.getElementById('nombre') as HTMLInputElement).value;
        const legajo = Number((document.getElementById('legajo') as HTMLInputElement).value);

        const nuevoAlumno = new Prueba.Alumno(apellido, nombre, legajo);

        // Mostrar por consola
        console.log(nuevoAlumno.ToString());

        // Mostrar por alert
        alert(nuevoAlumno.ToString());
    }
}