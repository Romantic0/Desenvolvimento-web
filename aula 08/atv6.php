<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = 0;
    $limite = 50.00;

    foreach ($_POST as $item => $valor) {
        $total += $valor;
    }

    if ($total > $limite) {
        $excedente = $total - $limite;
        echo "<p style='color:red;'>O valor excede em R$ $excedente</p>";
    } elseif ($total < $limite) {
        $restante = $limite - $total;
        echo "<p style='color:blue;'>Joãozinho ainda pode gastar R$ $restante</p>";
    } else {
        echo "<p style='color:green;'>O saldo para compras foi esgotado</p>";
    }
}
?>
<form method="POST">
    <input type="number" name="maca" placeholder="Maçã (Kg)">
    <input type="number" name="melancia" placeholder="Melancia (Kg)">
    <input type="number" name="laranja" placeholder="Laranja (Kg)">
    <input type="number" name="repolho" placeholder="Repolho (Kg)">
    <input type="number" name="cenoura" placeholder="Cenoura (Kg)">
    <input type="number" name="batatinha" placeholder="Batatinha (Kg)">
    <button type="submit">Calcular</button>
</form>
