const form = document.getElementById('form');
const inputNumber = document.getElementById('number');
const erroInput = document.getElementById('erro');

function numberCheck(){
    if(inputNumber.value.length < 1){
    erroInput.style.display = "block";
    }
}