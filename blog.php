<?php
$posts = [];
$jsonPath = __DIR__ . '/data/blog.json';
if(file_exists($jsonPath)){
  $data = json_decode(file_get_contents($jsonPath), true);
  $posts = $data['posts'] ?? [];
}
$post = null;
if(isset($_GET['id'])){
  foreach($posts as $p){ if($p['id']==$_GET['id']){ $post=$p; break; } }
}
function h($s){ return htmlspecialchars($s??'',ENT_QUOTES,'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $post ? h($post['title']).' - ' : '' ?>EFE Blog</title>
<style>
:root{--bg:#070A12;--text:#EAF0FF;--muted:#A9B3D1;--line:rgba(255,255,255,.08);--accent:#7C5CFF;--accent2:#2FE3C0}
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif;background:var(--bg);color:var(--text);line-height:1.7}
a{color:inherit;text-decoration:none}
.container{max-width:860px;margin:0 auto;padding:0 20px}
.topbar{position:sticky;top:0;z-index:100;background:rgba(7,10,18,.9);backdrop-filter:blur(12px);border-bottom:1px solid var(--line);padding:14px 0}
.topbar .container{display:flex;align-items:center;justify-content:space-between}
.logo{font-weight:800;font-size:20px;color:var(--accent2)}
.btn{display:inline-flex;align-items:center;padding:8px 16px;border-radius:10px;border:1px solid var(--line);background:rgba(255,255,255,.04);cursor:pointer;font-size:14px;color:var(--text)}
.hero{padding:60px 0 30px;border-bottom:1px solid var(--line);margin-bottom:40px}
.tag{display:inline-block;padding:6px 12px;border:1px solid var(--line);border-radius:999px;font-size:12px;color:var(--muted);margin-bottom:16px}
h1{font-size:40px;line-height:1.2;margin-bottom:16px;font-weight:800}
.meta{color:var(--muted);font-size:14px}
.cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;margin-top:32px}
.card{background:rgba(255,255,255,.04);border:1px solid var(--line);border-radius:18px;padding:24px;cursor:pointer;transition:all .3s}
.card:hover{border-color:rgba(124,92,255,.4);transform:translateY(-3px)}
.card h3{font-size:18px;margin:10px 0 8px;color:var(--text)}
.card p{color:var(--muted);font-size:14px}
.card .date{font-size:12px;color:var(--muted)}
.card .more{margin-top:14px;color:var(--accent2);font-size:13px}
.content{padding:40px 0 80px;font-size:17px;color:var(--muted);line-height:1.8}
.content p{margin-bottom:20px}
.content h2{color:var(--text);margin:32px 0 12px;font-size:24px}
.footer{padding:24px 0;border-top:1px solid var(--line);color:var(--muted);text-align:center;font-size:13px}
@media(max-width:600px){h1{font-size:28px}}
</style>
</head>
<body>
<header class="topbar">
  <div class="container">
    <a class="logo" href="/">EFE Consultoria</a>
    <a class="btn" href="/">Voltar ao site</a>
  </div>
</header>

<?php if($post): ?>
<div class="hero">
  <div class="container">
    <div class="tag">Artigo</div>
    <h1><?= h($post['title']) ?></h1>
    <div class="meta"><?= h($post['date']) ?></div>
  </div>
</div>
<div class="content">
  <div class="container">
    <?= $post['content'] ?>
    <div style="margin-top:40px;padding-top:24px;border-top:1px solid var(--line)">
      <a href="/blog.php" style="color:var(--accent2)">&larr; Voltar ao blog</a>
    </div>
  </div>
</div>

<?php else: ?>
<div class="hero">
  <div class="container">
    <div class="tag">Blog</div>
    <h1>Artigos e Insights</h1>
    <p style="color:var(--muted);margin-top:12px">Gestao, financas e estrategia para empresas que querem crescer com lucro.</p>
  </div>
</div>
<div class="container" style="padding-bottom:80px">
  <?php if(empty($posts)): ?>
    <p style="color:var(--muted);text-align:center;padding:60px 0">Nenhum artigo publicado ainda.</p>
  <?php else: ?>
    <div class="cards">
      <?php foreach(array_reverse($posts) as $p): ?>
        <article class="card" onclick="location.href='/blog.php?id=<?= h($p['id']) ?>'">
          <div class="date"><?= h($p['date']) ?></div>
          <h3><?= h($p['title']) ?></h3>
          <p><?= h($p['excerpt']) ?></p>
          <div class="more">Ler mais &rarr;</div>
        </article>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>

<footer class="footer">
  <div class="container">&copy; <?php echo date('Y'); ?> EFE - Consultoria e Assessoria Empresarial</div>
</footer>
</body>
</html>