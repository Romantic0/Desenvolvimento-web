<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Simulação de validação do usuário e time
    if ($login === 'usuario' && $senha === '1234') {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        $_SESSION['time'] = 'Flamengo'; // Exemplo de time (pode vir do banco de dados)
        $_SESSION['inicio_sessao'] = date('Y-m-d H:i:s');
        $_SESSION['ultima_requisicao'] = date('Y-m-d H:i:s');

        header('Location: ex2dashboard.php');
        exit;
    } else {
        header('Location: ex2login.php?erro=Login ou senha inválidos!');
        exit;
    }
}
?>
