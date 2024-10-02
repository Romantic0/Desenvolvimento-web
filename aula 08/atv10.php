<?php

// Definindo o array conforme a imagem
$pastas = array(
    "bsn" => array(
        "3a Fase" => array(
            "desenvWeb", 
            "bancoDados 1", 
            "engSoft 1"
        ),
        "4a Fase" => array(
            "Intro Web", 
            "bancoDados 2", 
            "engSoft 2"
        )
    )
);

// Função recursiva para criar a árvore
function criarArvore($array, $nivel = 0) {
    // Percorre o array
    foreach ($array as $chave => $valor) {
        // Insere os traços de acordo com o nível para criar a hierarquia
        echo str_repeat("-", $nivel) . " " . (is_array($valor) ? $chave : $valor) . "<br>";
        
        // Se o valor for um array, chama a função recursivamente
        if (is_array($valor)) {
            criarArvore($valor, $nivel + 1);
        }
    }
}

// Exibindo a árvore
criarArvore($pastas);

?>
