/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

const radios = document.querySelectorAll("#pelicula");
const radios2 = document.querySelectorAll("#sop");
const radios3 = document.querySelectorAll("#gen");



for (let i = 0; i < radios.length; i++) {
    radios[i].onclick = function () {
        const valorPeli = radios[i].value;
        const renglon = document.querySelector("#_" + valorPeli);
        const nombre = document.querySelector("#titulo");
        const soporte = document.querySelector("#soporte");
        const genero = document.querySelector("#genero");
        const idpelicula = document.querySelector("#idpelicula");
        const guarda = document.querySelector("#guarda");
        const select = document.querySelectorAll("select");
        nombre.disabled = true;
        soporte.disabled = true;
        genero.disabled = true;
        guarda.disabled = true;
        select[0].disabled = true;
        select[1].disabled = true;
        idpelicula.value = valorPeli;
        nombre.value = renglon.childNodes[1].textContent;
        soporte.value = renglon.childNodes[2].textContent;
        genero.value = renglon.childNodes[3].textContent;

    };
    function seleccionSop(){
    const listSoporte = document.getElementById("list-soporte");
    const idSop = listSoporte.value;
    const nomSoporte = listSoporte.children[listSoporte.value-1].text;
    const idsoporte = document.querySelector("#idsoporte");
    const soporte = document.querySelector("#soporte");
    
    idsoporte.value = idSop;
    soporte.value = nomSoporte;
    
    console.log(idSop);
    console.log(nomSoporte);
    }
    
    function seleccionGen(){
    let listGenero = document.getElementById("list-genero");
    let idGen = listGenero.value;
    let descripcionGen = listGenero.children[listGenero.value-1].text;
    const idgenero = document.querySelector("#idgenero");
    const genero = document.querySelector("#genero");
    
    idgenero.value = idGen;
    genero.value = descripcionGen;
   
    console.log(idGen);
    console.log(descripcionGen);
    }

    function nuevoRegistro() {
        const nombre = document.querySelector("#titulo");
        const soporte = document.querySelector("#soporte");
        const genero = document.querySelector("#genero");
        const guarda = document.querySelector("#guarda");
        const select = document.querySelectorAll("select");
        nombre.disabled = false;
        select[0].disabled = false;
        select[1].disabled = false;
        guarda.disabled=false;
        nombre.value = '';
        soporte.value = '';
        genero.value = '';
    }

    function modificarRegistro() {
        const nombre = document.querySelector("#titulo");
        const guarda = document.querySelector("#guarda");
        const select = document.querySelectorAll("select");
        if(nombre.value === ''){
            return;
        }
        else{
            nombre.disabled = false;
            select[0].disabled = false;
            select[1].disabled = false;
            guarda.disabled=false;

        }
        
    }
    
    

    const nuevo = document.querySelector("#nuevo");
    const modificar = document.querySelector("#modificar");

    nuevo.addEventListener('click', nuevoRegistro);
    modificar.addEventListener('click', modificarRegistro);
}


