<?php
try {
    // Conexão com o banco de dados
    $dbconn = pg_connect("host=localhost port=5432 dbname=devweb user=postgres password=postgres");

    if ($dbconn) {
        // Consulta para obter todas as pessoas cadastradas
        $query = "SELECT PESCODIGO, PESNOME, PESSOBRENOME, PESEMAIL, PESCIDADE, PESESTADO, CREATEDAT 
                  FROM TBPESSOA 
                  ORDER BY CREATEDAT DESC";

        $result = pg_query($dbconn, $query);

        if (!$result) {
            throw new Exception("Erro ao executar consulta no banco de dados.");
        }

        // Armazenar os resultados em um array
        $pessoas = [];
        while ($row = pg_fetch_assoc($result)) {
            $pessoas[] = $row;
        }

        // Fechar a conexão
        pg_close($dbconn);
    } else {
        throw new Exception("Não foi possível conectar ao banco de dados.");
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas Cadastradas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Lista de Pessoas Cadastradas</h1>
    <?php if (!empty($pessoas)): ?>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($pessoa['pescodigo']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['pesnome']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['pessobrenome']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['peseemail']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['pescidade']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['pesestado']); ?></td>
                        <td><?php echo htmlspecialchars($pessoa['createdat']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma pessoa cadastrada no momento.</p>
    <?php endif; ?>
</body>
</html>
