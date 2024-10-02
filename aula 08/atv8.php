<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcelas de Moto - Paulinho</title>
</head>
<body>
    <h1>Calcular Valor das Parcelas (Juros Simples)</h1>
    <form method="POST">
        <label for="cash_price">Valor à vista da moto (R$):</label>
        <input type="number" id="cash_price" name="cash_price" value="8654" readonly><br><br>

        <label for="installments">Escolha o número de parcelas:</label>
        <select id="installments" name="installments">
            <option value="24">24 vezes</option>
            <option value="36">36 vezes</option>
            <option value="48">48 vezes</option>
            <option value="60">60 vezes</option>
        </select><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cash_price = 8654;
        $installments = $_POST['installments'];

        switch ($installments) {
            case 24:
                $interest_rate = 0.015; // 1.5%
                break;
            case 36:
                $interest_rate = 0.02; // 2%
                break;
            case 48:
                $interest_rate = 0.025; // 2.5%
                break;
            case 60:
                $interest_rate = 0.03; // 3%
                break;
        }

        $total_price = $cash_price * (1 + ($interest_rate * $installments));
        $installment_value = $total_price / $installments;

        echo "<h2>Resultados</h2>";
        echo "Número de parcelas: $installments<br>";
        echo "Valor de cada parcela: R$ " . number_format($installment_value, 2, ',', '.') . "<br>";
        echo "Valor total a pagar: R$ " . number_format($total_price, 2, ',', '.');
    }
    ?>
</body>
</html>
