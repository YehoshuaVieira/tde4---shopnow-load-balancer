<?php

$servidor = getenv('SERVER_ID') ?: 'Servidor desconhecido';

$produtos = [
    ['nome' => 'Notebook Gamer', 'preco' => 4599.90],
    ['nome' => 'Smartphone', 'preco' => 2199.90],
    ['nome' => 'Headset Gamer', 'preco' => 299.90],
    ['nome' => 'Teclado Mecânico', 'preco' => 349.90],
];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopNow - Black Friday</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #101827;
            color: white;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        .servidor {
            background: #14532d;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        .produto {
            background: #1e293b;
            padding: 20px;
            margin-bottom: 12px;
            border-radius: 8px;
        }
        .preco {
            color: #4ade80;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SHOPNOW</h1>
        <h2>🔥 BLACK FRIDAY</h2>

        <div class="servidor">
            <strong>Servidor responsável:</strong>
            <?= htmlspecialchars($servidor) ?>
        </div>

        <h2>Ofertas disponíveis</h2>

        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                <p class="preco">
                    R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
