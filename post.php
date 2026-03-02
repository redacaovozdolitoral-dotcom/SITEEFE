<?php 
$posts = json_decode(@file_get_contents('posts.json'), true); 
$post = $posts[$_GET['id']] ?? null; 
if(!$post) { header("Location: index.php"); exit; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"><title><?= $post['titulo'] ?> | efe</title>
    <link rel="icon" type="image/png" href="assets/logofavicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>body { background: #05070A; color: #fff; font-family: sans-serif; }</style>
</head>
<body class="p-6 md:p-20">
    <nav class="max-w-4xl mx-auto mb-16 flex justify-between items-center"><a href="index.php" class="text-purple-400 font-bold uppercase text-[10px]">← Voltar</a></nav>
    <article class="max-w-3xl mx-auto">
        <?php if(!empty($post['foto'])): ?><img src="<?= $post['foto'] ?>" class="w-full rounded-[40px] mb-12 border border-white/10 shadow-2xl"><?php endif; ?>
        <h1 class="text-3xl md:text-5xl font-black mb-10 italic uppercase leading-tight"><?= $post['titulo'] ?></h1>
        <div class="text-gray-400 text-lg leading-relaxed italic space-y-6"><?= nl2br($post['texto']) ?></div>
    </article>
</body>
</html>