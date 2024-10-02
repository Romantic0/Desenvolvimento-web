<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $altura = $_POST['altura'];
    $area = ($base * $altura) / 2;
    echo "A área do triângulo retângulo com base $base e altura $altura é $area metros quadrados";
}
?>
<form method="POST">
    <input type="number" name="base" placeholder="Base (metros)">
    <input type="number" name="altura" placeholder="Altura (metros)">
    <button type="submit">Calcular</button>
</form>
