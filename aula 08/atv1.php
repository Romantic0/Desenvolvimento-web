<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $soma = $a + $b + $c;

    if ($a > 10) {
        echo "<p style='color:blue;'>A soma é: $soma</p>";
    } elseif ($b < $c) {
        echo "<p style='color:green;'>A soma é: $soma</p>";
    } elseif ($c < $a && $c < $b) {
        echo "<p style='color:red;'>A soma é: $soma</p>";
    }
}
?>
<form method="POST">
    <input type="number" name="a" placeholder="Valor 1">
    <input type="number" name="b" placeholder="Valor 2">
    <input type="number" name="c" placeholder="Valor 3">
    <button type="submit">Calcular</button>
</form>
