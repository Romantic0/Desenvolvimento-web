function adicionarLinha() {
    const tabela = document.getElementById('tabela-notas');
    const tbody = tabela.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    
    // Cria a linha de totais
    const totalRow = document.createElement('tr');
    totalRow.innerHTML = '<td>Média das Notas</td>';
    
    // Calcula a média de cada coluna
    for (let i = 1; i <= 9; i++) {
        let total = 0, count = 0;
        rows.forEach(row => {
            const cell = row.children[i].textContent.replace(',', '.');
            const value = parseFloat(cell);
            if (!isNaN(value)) {
                total += value;
                count++;
            }
        });
        const average = count ? (total / count).toFixed(2).replace('.', ',') : '0';
        totalRow.innerHTML += `<td>${average}</td>`;
    }
    tbody.appendChild(totalRow);
}

function adicionarColuna() {
    const tabela = document.getElementById('tabela-notas');
    const thead = tabela.querySelector('thead');
    const tbody = tabela.querySelector('tbody');
    const headerRow = thead.querySelector('tr:nth-child(2)');
    
    // Adiciona o cabeçalho da nova coluna
    headerRow.innerHTML += '<th>Média</th>';

    // Adiciona a média para cada aluno
    tbody.querySelectorAll('tr').forEach(row => {
        const cells = Array.from(row.children);
        const notas = cells.slice(1, -1).map(cell => parseFloat(cell.textContent.replace(',', '.')));
        const total = notas.reduce((acc, curr) => acc + (isNaN(curr) ? 0 : curr), 0);
        const average = (total / notas.length).toFixed(2).replace('.', ',');
        row.innerHTML += `<td>${average}</td>`;
    });

    // Adiciona uma linha com a média geral
    const totalRow = document.createElement('tr');
    totalRow.innerHTML = '<td>Média Geral</td>';
    let grandTotal = 0, count = 0;
    tbody.querySelectorAll('tr').forEach(row => {
        const cell = row.lastElementChild;
        const average = parseFloat(cell.textContent.replace(',', '.'));
        if (!isNaN(average)) {
            grandTotal += average;
            count++;
        }
    });
    const grandAverage = count ? (grandTotal / count).toFixed(2).replace('.', ',') : '0';
    totalRow.innerHTML += `<td>${grandAverage}</td>`;
    tbody.appendChild(totalRow);
}
