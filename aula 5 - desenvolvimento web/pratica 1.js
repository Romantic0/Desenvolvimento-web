let valor1 = '', valor2 = '', operator = '';
let isOperatorSelected = false;

function soma() { return parseFloat(valor1) + parseFloat(valor2); }
function subtrai() { return parseFloat(valor1) - parseFloat(valor2); }
function multiplica() { return parseFloat(valor1) * parseFloat(valor2); }
function divide() { return parseFloat(valor1) / parseFloat(valor2); }

function atualizarDisplay(resultado) {
    const display = document.querySelector('.display_calc');
    display.textContent = resultado;

    if (resultado > 0) {
        display.style.backgroundColor = 'green';
    } else if (resultado < 0) {
        display.style.backgroundColor = 'red';
    } else if (resultado === 0) {
        display.style.backgroundColor = 'gray';
    } else {
        display.textContent = 'Error';
        display.style.backgroundColor = 'yellow';
    }
}

document.querySelector('.keys_calc').addEventListener('click', function(e) {
    const key = e.target.textContent;

    if (!isNaN(key)) { // Se for número
        if (isOperatorSelected) {
            valor2 += key;
        } else {
            valor1 += key;
        }
        document.querySelector('.display_calc').textContent += key;
    } else if (['+', '-', '*', '/'].includes(key)) { // Se for operador
        if (valor1) {
            operator = key;
            document.querySelector('.display_calc').textContent += key;
            isOperatorSelected = true;
        }
    } else if (key === '=') { // Se for igual
        let resultado;
        if (operator === '+') resultado = soma();
        if (operator === '-') resultado = subtrai();
        if (operator === '*') resultado = multiplica();
        if (operator === '/') resultado = divide();

        if (!isNaN(resultado)) { // Checa se o resultado é um número válido
            atualizarDisplay(resultado);
            valor1 = resultado.toString(); // Armazena o resultado para operações futuras
            valor2 = '';
            isOperatorSelected = false;
        } else {
            atualizarDisplay('Error');
        }
    } else if (key === 'C') { // Se for limpar
        valor1 = '';
        valor2 = '';
        operator = '';
        isOperatorSelected = false;
        document.querySelector('.display_calc').textContent = '';
        document.querySelector('.display_calc').style.backgroundColor = '';
    }
});
