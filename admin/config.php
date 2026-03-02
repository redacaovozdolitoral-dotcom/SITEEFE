<?php
if(session_status()===PHP_SESSION_NONE)session_start();
if(!defined('DB_HOST')){
  define('DB_HOST','db1933.hstgr.io');
  define('DB_NAME','u209967523_efeconsultoria');
  define('DB_USER','u209967523_efe');
  define('DB_PASS','Luigi@8520#');
}
if(!function_exists('db')){
  function db():PDO{static $p=null;if($p)return $p;$p=new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',DB_USER,DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);return $p;}
  function h(?string $s):string{return htmlspecialchars($s??'',ENT_QUOTES,'UTF-8');}
  function require_login():void{if(empty($_SESSION['admin_id'])){header('Location:/admin/login.php');exit;}}
  function slugify(string $t):string{$t=trim(mb_strtolower($t,'UTF-8'));$t=iconv('UTF-8','ASCII//TRANSLIT//IGNORE',$t);$t=preg_replace('~[^a-z0-9]+~','-',$t);return trim($t,'-')?:'post';}
  function upload_image(string $f):array{if(empty($_FILES[$f])||$_FILES[$f]['error']!==0)return[false,'Erro upload',null];if($_FILES[$f]['size']>5*1024*1024)return[false,'Máx 5MB',null];$fi=finfo_open(FILEINFO_MIME_TYPE);$m=finfo_file($fi,$_FILES[$f]['tmp_name']);finfo_close($fi);$e=match($m){'image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp',default=>null};if(!$e)return[false,'Use JPG PNG WEBP',null];$d=__DIR__.'/../upload';if(!is_dir($d))@mkdir($d,0755,true);$n='img_'.date('Ymd_His').'_'.bin2hex(random_bytes(4)).'.'.$e;if(!move_uploaded_file($_FILES[$f]['tmp_name'],$d.'/'.$n))return[false,'Falha',null];return[true,'OK','/upload/'.$n];}
}
