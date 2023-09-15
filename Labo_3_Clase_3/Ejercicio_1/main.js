"use strict";
/**
 * Aplicación No 1 (Mostrar números impares)
 * Confeccionar un programa que solicite el ingreso de un número positivo (validar) y que
 * muestre en un <input type=”text”> la cantidad de números impares que hay entre ese número
 * y el cero. Realizarlo utilizando el objeto XMLHttpRequest.
 */
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("numero");
    const btnCalcular = document.getElementById("calcular");
    const inputResultado = document.getElementById("resultado");
    btnCalcular.addEventListener("click", () => {
        const numero = parseInt(input.value);
        if (isNaN(numero) || numero < 0) {
            alert("Por favor, ingrese numero positivo valido");
            return;
        }
        //Realizo la solicitud en AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `Backend/calcular_impares.php?numero=${numero}`, true);
        xhr.onload = () => {
            if (xhr.status === 200) {
                const cantidadImpares = parseInt(xhr.responseText);
                inputResultado.value = cantidadImpares.toString();
            }
        };
        xhr.send();
    });
});
