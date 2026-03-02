<?php
header("Content-Type: application/xml; charset=utf-8");
$posts = json_decode(@file_get_contents('posts.json'), true) ?: [];
$base_url = "https://seudominio.com.br/"; // ALTERE PARA O LINK REAL DO SITE

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $base_url ?></loc>
        <priority>1.0</priority>
    </url>
    <?php foreach($posts as $key => $post): ?>
    <url>
        <loc><?= $base_url ?>post.php?id=<?= $key ?></loc>
        <lastmod><?= date('Y-m-d') ?></lastmod>
        <priority>0.8</priority>
    </url>
    <?php endforeach; ?>
</urlset>