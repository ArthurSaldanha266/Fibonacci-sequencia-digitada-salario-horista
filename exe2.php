<?php
declare(strict_types=1);

if (isset($_POST['numeros'])) {
    $numeros = array_map('intval', $_POST['numeros']);
    $menor = min($numeros);
    $maior = max($numeros);

} elseif (isset($_POST['quantidade'])) {
    $quantidade = (int) $_POST['quantidade'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 2 - Sequência de Números</title>
</head>
<body>
    <h1>Sequência de Números</h1>

    <?php if (isset($numeros)): ?>

        <h2>Resultado</h2>
        <p>Sequência digitada: <?= implode(', ', $numeros) ?></p>
        <p>Menor número: <?= $menor ?></p>
        <p>Maior número: <?= $maior ?></p>

    <?php elseif (isset($quantidade)): ?>

        <form method="post">
            <?php for ($i = 1; $i <= $quantidade; $i++): ?>
                Número <?= $i ?>: <input type="number" name="numeros[]" required><br><br>
            <?php endfor; ?>
            <button type="submit">Calcular</button>
        </form>

    <?php else: ?>

        <form method="post">
            digite um numero até 10: <input type="number" name="quantidade" min="1" max="10" required>
            <button type="submit">Avançar</button>
        </form>

    <?php endif; ?>
</body>
</html>