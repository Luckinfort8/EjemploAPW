/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

const radios = document.querySelectorAll("#genero");

for (let i = 0; i < radios.length; i++) {
    radios[i].onclick = function () {
        const valor = radios[i].value;
        const renglon = document.querySelector("#_" + valor);
        const nombre = document.querySelector("#nombre");
        const descripcion = document.querySelector("#descripcion");
        const idgenero = document.querySelector("#idgenero");
        nombre.disabled = true;
        descripcion.disabled = true;
        idgenero.value = valor;
        nombre.value = renglon.childNodes[1].textContent;
        descripcion.value = renglon.childNodes[2].textContent;

    };


    function nuevoRegistro() {
        const nombre = document.querySelector("#nombre");
        const descripcion = document.querySelector("#descripcion");
        nombre.disabled = false;
        descripcion.disabled = false;
        nombre.value = '';
        descripcion.value = '';
    }

    function modificarRegistro() {
        const nombre = document.querySelector("#nombre");
        const descripcion = document.querySelector("#descripcion");
        nombre.disabled = false;
        descripcion.disabled = false;
        
    }

    const nuevo = document.querySelector("#nuevo");
    const modificar = document.querySelector("#modificar");

    nuevo.addEventListener('click', nuevoRegistro);
    modificar.addEventListener('click', modificarRegistro);
}


