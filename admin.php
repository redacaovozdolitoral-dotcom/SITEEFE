<?php
ob_start();
$senha_mestra = "efe2026";
$cookie_name = "efe_auth_admin";

if(isset($_POST['login']) && $_POST['pass'] === $senha_mestra){
    setcookie($cookie_name, md5($senha_mestra), time() + (86400 * 30), "/");
    header("Location: admin.php"); exit;
}
if(isset($_GET['logout'])){
    setcookie($cookie_name, "", time() - 3600, "/");
    header("Location: index.php"); exit;
}

$autorizado = (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === md5($senha_mestra));

if (!$autorizado): ?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Login efe</title><style>
    body { background: #05070A; color: #fff; display: flex; align-items: center; justify-content: center; height: 100vh; font-family: sans-serif; }
    form { background: #111; padding: 40px; border-radius: 20px; border: 1px solid #222; text-align: center; }
    input { padding: 12px; border-radius: 8px; border: 0; background: #222; color: #fff; margin-bottom: 15px; width: 200px; text-align: center; }
    button { padding: 12px 30px; background: #7C5CFF; color: #fff; border: 0; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; }
</style></head>
<body><form method="POST"><h2>Login Admin</h2><input type="password" name="pass" placeholder="Senha" required><br><button name="login">ENTRAR</button></form></body></html>
<?php exit; endif;

if(isset($_POST['save_p'])){
    file_put_contents('processo.json', json_encode(['texto' => $_POST['proc_txt']]));
    $msg = "Processo atualizado!";
}

$posts = json_decode(@file_get_contents('posts.json'), true) ?: [];

if(isset($_GET['del'])){
    $id = $_GET['del'];
    if(isset($posts[$id])){
        if(file_exists($posts[$id]['foto'])) unlink($posts[$id]['foto']);
        unset($posts[$id]);
        file_put_contents('posts.json', json_encode(array_values($posts)));
        header("Location: admin.php"); exit;
    }
}

if(isset($_POST['pub'])){
    $foto_path = "";
    if($_FILES['foto']['name']){
        if(!is_dir('uploads')) mkdir('uploads', 0777, true);
        $foto_path = 'uploads/'.time().'_'.$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto_path);
    }
    array_unshift($posts, ["titulo" => $_POST['titulo'], "texto" => $_POST['texto'], "foto" => $foto_path, "data" => date('d/m/Y')]);
    file_put_contents('posts.json', json_encode($posts));
    header("Location: admin.php?ok=1"); exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Painel Admin</title><style>
    body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
    .container { max-width: 800px; margin: auto; background: #fff; padding: 30px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    textarea, input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
    button { padding: 15px; background: #05070A; color: #fff; border: 0; border-radius: 8px; cursor: pointer; font-weight: bold; width: 100%; }
</style></head>
<body>
<div class="container">
    <h2>Painel Administrativo <a href="?logout=true" style="float:right; color:red; font-size:12px; text-decoration:none;">SAIR</a></h2>
    
    <form method="POST" style="background:#eef2ff; padding:20px; border-radius:15px; margin-bottom:30px;">
        <h3>1. Editar Metodologia (Página Processo)</h3>
        <textarea name="proc_txt" style="height:100px;"><?= json_decode(@file_get_contents('processo.json'),true)['texto'] ?? "" ?></textarea>
        <button name="save_p" style="background:#4f46e5;">SALVAR PÁGINA DE PROCESSO</button>
    </form>

    <form method="POST" enctype="multipart/form-data" style="background:#f9f9f9; padding:20px; border-radius:15px;">
        <h3>2. Nova Matéria no Blog</h3>
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="texto" placeholder="Texto da notícia..." style="height:100px;"></textarea>
        <input type="file" name="foto" required><br><br>
        <button name="pub">PUBLICAR NO SITE</button>
    </form>

    <h3>Posts Atuais</h3>
    <?php foreach($posts as $idx => $p): ?>
        <div style="display:flex; justify-content:space-between; padding:10px; border-bottom:1px solid #eee;">
            <span><?= $p['titulo'] ?></span>
            <a href="?del=<?= $idx ?>" style="color:red; font-weight:bold; text-decoration:none;">[X]</a>
        </div>
    <?php endforeach; ?>
</div>
</body></html>