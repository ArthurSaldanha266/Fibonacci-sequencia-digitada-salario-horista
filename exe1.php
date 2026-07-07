<?php
declare(strict_types=1);

if (isset($_POST['valorHora'])) {

    $valorHora = (float) str_replace(',', '.', $_POST['valorHora']);
    $horas     = (float) str_replace(',', '.', $_POST['horas']);
    $filhos    = (int) $_POST['filhos'];

    $salarioBruto = $valorHora * $horas;

    if ($salarioBruto <= 788.00) {
        $valorPorFilho = 30.50;
    } elseif ($salarioBruto <= 1100.00) {
        $valorPorFilho = 18.50;
    } else {
        $valorPorFilho = 11.90;
    }

    $salarioFamilia = $valorPorFilho * $filhos;
    $salarioLiquido = $salarioBruto + $salarioFamilia;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 1 - Salário Horista</title>
</head>
<body>
    <h1>Cálculo de Salário do Empregado Horista</h1>
    <h3>Vamos calcular seu salário junto ao salário família que se é aplicado se tiver algum filho! <br> a idade que lhe trara certo benefício </h3>

    <form method="post">
        Valor do salário-hora (R$): <input type="text" name="valorHora" required><br><br>
        Horas trabalhadas no mês: <input type="text" name="horas" required><br><br>
        Filhos menores de 14 anos: <input type="number" name="filhos" min="0" required><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($salarioBruto)): ?>
        <h2>Resultado</h2>
        <p>Salário Bruto: R$ <?= number_format($salarioBruto, 2, ',', '.') ?></p>
        <p>Salário Família: R$ <?= number_format($salarioFamilia, 2, ',', '.') ?></p>
        <p>Salário Líquido: R$ <?= number_format($salarioLiquido, 2, ',', '.') ?></p>
    <?php endif; ?>
</body>
</html>