<?php
require __DIR__.'/config.php';
$pdo=db();$err='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $st=$pdo->prepare("SELECT * FROM admins WHERE email=?");
  $st->execute([trim($_POST['email']??'')]);
  $u=$st->fetch();
  if($u&&password_verify((string)($_POST['password']??''),$u['pass_hash'])){$_SESSION['admin_id']=(int)$u['id'];header('Location:/admin/');exit;}
  $err='Login inválido.';
}
?>
<!doctype html><html lang="pt-br"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Admin EFE</title>
<style>body{font-family:system-ui,Arial;background:#070A12;color:#EAF0FF;margin:0}.w{max-width:420px;margin:60px auto;padding:18px}.card{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.12);border-radius:16px;padding:24px}input{width:100%;padding:12px;border-radius:10px;border:1px solid rgba(255,255,255,.16);background:rgba(0,0,0,.3);color:#fff;margin-bottom:14px;box-sizing:border-box}.btn{width:100%;padding:13px;border-radius:10px;background:#2F6FED;color:#fff;font-weight:900;border:0;cursor:pointer;font-size:16px}.err{color:#ffb3b3;margin-bottom:10px}</style>
</head><body><div class="w"><h2>Painel EFE</h2>
<?php if($err):?><p class="err"><?=h($err)?></p><?php endif;?>
<form class="card" method="post">
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Senha" required>
<button class="btn">Entrar</button>
</form></div></body></html>
