<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $area = $a * $b;

    if ($area > 10) {
        echo "<h1>A área do retângulo de lados $a e $b metros é $area metros quadrados</h1>";
    } else {
        echo "<h3>A área do retângulo de lados $a e $b metros é $area metros quadrados</h3>";
    }
}
?>
<form method="POST">
    <input type="number" name="a" placeholder="Lado A (metros)">
    <input type="number" name="b" placeholder="Lado B (metros)">
    <button type="submit">Calcular</button>
</form>
