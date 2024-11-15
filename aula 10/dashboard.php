<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

// Atualizar a hora da última requisição
$_SESSION['ultima_requisicao'] = date('Y-m-d H:i:s');

// Calcular o tempo de sessão
$inicio_sessao = strtotime($_SESSION['inicio_sessao']);
$tempo_sessao = time() - $inicio_sessao;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['login']); ?>!</h1>
    <p><strong>Login:</strong> <?php echo htmlspecialchars($_SESSION['login']); ?></p>
    <p><strong>Senha:</strong> <?php echo htmlspecialchars($_SESSION['senha']); ?></p>
    <p><strong>Data/hora de início da sessão:</strong> <?php echo $_SESSION['inicio_sessao']; ?></p>
    <p><strong>Data/hora da última requisição:</strong> <?php echo $_SESSION['ultima_requisicao']; ?></p>
    <p><strong>Tempo de sessão:</strong> <?php echo gmdate("H:i:s", $tempo_sessao); ?></p>
    <br>
    <a href="logout.php">Sair</a>
</body>
</html>
