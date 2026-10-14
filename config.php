<?php
session_start();
try{$db=new PDO('mysql:host=localhost;dbname=eventhub;charset=utf8mb4','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);}catch(Throwable $e){exit('Database unavailable. Import database.sql.');}
function h($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function go($x){header('Location: '.$x);exit;}
function token(){return $_SESSION['token']??=bin2hex(random_bytes(32));}
function check(){if($_SERVER['REQUEST_METHOD']!=='POST'||!hash_equals(token(),$_POST['token']??'')){http_response_code(403);exit('Invalid request');}}
function auth(){if(empty($_SESSION['uid']))go('login.php');}
function admin(){auth();if(($_SESSION['role']??'')!=='admin'){http_response_code(403);exit('Forbidden');}}
function head($t){echo '<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.h($t).' - EventHub</title><link rel="stylesheet" href="style.css"></head><body><header><a href="index.php"><b>✦ EventHub</b></a><nav><a href="index.php">Events</a>';if(isset($_SESSION['uid'])){echo '<a href="my_events.php">My Events</a>';if(($_SESSION['role']??'')==='admin')echo '<a href="admin.php">Admin</a>';echo '<a href="logout.php">Logout</a>';}else echo '<a href="login.php">Login</a><a href="register.php">Sign Up</a>';echo '</nav></header><main>';}
function foot(){echo '</main><footer>EventHub — College project demonstration</footer></body></html>';}
