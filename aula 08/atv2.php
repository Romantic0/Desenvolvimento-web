<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    if ($numero % 2 == 0) {
        echo "Valor divisível por 2";
    } else {
        echo "O valor não é divisível por 2";
    }
}
?>
<form method="POST">
    <input type="number" name="numero" placeholder="Digite um número">
    <button type="submit">Testar</button>
</form>
