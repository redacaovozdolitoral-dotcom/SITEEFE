<?php $p = json_decode(@file_get_contents('processo.json'), true); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodologia | efe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { background: #05070A; color: #fff; font-family: sans-serif; }</style>
</head>
<body class="p-6 md:p-20">
    <nav class="max-w-4xl mx-auto mb-10"><a href="index.php" class="text-purple-400 font-bold uppercase text-[10px]">← Voltar</a></nav>
    <article class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-black mb-10 italic uppercase">Nossa Metodologia</h1>
        <div class="text-gray-400 text-lg leading-relaxed italic"><?= nl2br($p['texto'] ?? "Conteúdo em breve...") ?></div>
    </article>
</body></html>