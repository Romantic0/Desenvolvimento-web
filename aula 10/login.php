<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Aqui você pode validar o login e senha com valores fixos ou usando um banco de dados.
    if ($login === 'usuario' && $senha === '1234') {
        // Salvar dados na sessão
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha; // Para segurança, não é recomendado armazenar senhas em texto plano.
        $_SESSION['inicio_sessao'] = date('Y-m-d H:i:s');
        $_SESSION['ultima_requisicao'] = date('Y-m-d H:i:s');
        
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="post" action="">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
