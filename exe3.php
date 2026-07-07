<?php
declare(strict_types=1);

if (isset($_POST['n'])) {
    $n = (int) $_POST['n'];

    $fibonacci = [1, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    $primeirosN = array_slice($fibonacci, 0, $n);

    $anterior = 1;
    $atual = 1;
    while ($atual < $n) {
        $proximo = $anterior + $atual;
        $anterior = $atual;
        $atual = $proximo;
    }
    $pertence = ($atual === $n);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 3 - Fibonacci</title>
</head>
<body>
    <h1>Sequência de Fibonacci</h1>

    <form method="post">
        Digite um valor: <input type="number" name="n" min="1" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($n)): ?>
        <h2>Resultado</h2>
        <p>Os <?= $n ?> primeiros números de Fibonacci: <?= implode(', ', $primeirosN) ?></p>
        <p>O número <?= $n ?> <?= $pertence ? 'FAZ' : 'NÃO faz' ?> parte da sequência de Fibonacci.</p>
    <?php endif; ?>
</body>
</html>