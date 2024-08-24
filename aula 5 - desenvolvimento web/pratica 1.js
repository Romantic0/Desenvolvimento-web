




document.addEventListener('DOMContentLoaded', function () {
    // Obtém referências dos elementos da calculadora
    const valor1 = document.getElementById('valor1');
    const valor2 = document.getElementById('valor2');
    const resultado = document.getElementById('resultado');
    const buttons = document.querySelectorAll('.opcalc');

    // Adiciona eventos de clique para cada botão de operação
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Obtém os valores dos inputs e a ação do botão clicado
            const num1 = parseFloat(valor1.value);
            const num2 = parseFloat(valor2.value);
            const action = this.getAttribute('data-action');
            
            // Realiza o cálculo com base na ação
            if (isNaN(num1) || isNaN(num2)) {
                resultado.value = 'Erro: Insira números válidos';
                return;
            }

            switch (action) {
                case 'add':
                    resultado.value = num1 + num2;
                    break;
                case 'sub':
                    resultado.value = num1 - num2;
                    break;
                case 'mul':
                    resultado.value = num1 * num2;
                    break;
                case 'div':
                    if (num2 === 0) {
                        resultado.value = 'Erro: Divisão por zero';
                    } else {
                        resultado.value = num1 / num2;
                    }
                    break;
                default:
                    resultado.value = 'Erro: Operação inválida';
                    break;
            }
        });
    });
});