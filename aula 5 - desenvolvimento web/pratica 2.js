function adicionarmedia() {
    const tabela=document.getElementById('tabela-notas');
    const linhas = tabela.getElementById9('tbody')[0].getElementsBytagName('tr');

    for (let i=0; i <linhas.lenght; i++) {
        const celulas = linhas[i].getElementsBytagName('td');
        let soma = 0;
        let contador = 0;

        for (let j = 1; <celulas.lenght; j++) {
            soma += parseFloat (celulas[j].textcontent);
            contador++;
        }

        const media =(soma/contador).toFixed(2);
        const movecelula = document.createElement('td');
        novacelula.textcontent = media;
        linhas[i].appendchild(novacelula);
       }

        document.querySelector("button").disabled = true;
    }

