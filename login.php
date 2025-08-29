<?php
require_once __DIR__ . '/config.php';
session_start();
if (isset($_SESSION['aid'])) { header('Location: dashboard.php'); exit; }

$err = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $email = trim($_POST['email'] ?? '');
  $pass  = $_POST['password'] ?? '';
  try {
    $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $st = $pdo->prepare('SELECT id,password_hash FROM admins WHERE email = :e');
    $st->execute([':e'=>$email]);
    $row = $st->fetch(PDO::FETCH_ASSOC);
    if ($row && password_verify($pass,$row['password_hash'])) {
      $_SESSION['aid'] = (int)$row['id'];
      header('Location: dashboard.php'); exit;
    } else { $err = 'Identifiants invalides'; }
  } catch(Throwable $e) { $err = 'Erreur serveur'; }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Connexion — SM BUSINESS Private Care</title>
<link rel="icon" href="assets/favicon.svg">
<style>
:root{--bg:#ffffff;--ink:#0f0f10;--muted:#6b7280;--border:#e5e7eb;--ring:0 0 0 3px rgba(31,41,55,.25)}
*{box-sizing:border-box} body{margin:0;font-family:system-ui,Segoe UI,Roboto,Arial;background:linear-gradient(180deg,#fff,#f6f7f9)}
.main{min-height:100vh;display:grid;place-items:center}
.card{width:min(420px,92vw);background:#fff;border:1px solid var(--border);border-radius:14px;padding:22px;box-shadow:0 10px 30px rgba(0,0,0,.06)}
.logo{display:flex;align-items:center;gap:12px;margin-bottom:8px}
.logo-img{height:42px}
h1{font-size:20px;margin:6px 0 14px;color:var(--ink)}
label{font-weight:600;font-size:14px;color:var(--ink)}
input{width:100%;padding:12px;border-radius:10px;border:1px solid var(--border);background:#fff;outline:none}
input:focus{box-shadow:var(--ring)}
.btn{width:100%;padding:12px;border:none;border-radius:10px;background:var(--ink);color:#fff;font-weight:700;cursor:pointer}
.btn:hover{filter:brightness(1.05)}
.err{color:#b91c1c;margin:8px 0 0;font-size:14px}
.note{color:var(--muted);font-size:12px;margin-top:10px}
</style>
</head>
<body>
<div class="main">
  <form class="card" method="post" novalidate>
    <div class="logo">
      <img src="assets/logo.png" alt="SM Business Logo" class="logo-img" onerror="this.style.display='none'">
      <div>
        <div style="font-weight:800;letter-spacing:.3px;color:#0f0f10">SM BUSINESS PRIVATE CARE</div>
        <small class="note">Accès administrateur</small>
      </div>
    </div>
    <h1>Connexion</h1>
    <?php if ($err): ?><div class="err"><?= htmlspecialchars($err) ?></div><?php endif; ?>
    <label for="email">Email</label>
    <input id="email" name="email" type="email" placeholder="admin@smbusiness.drc" required>
    <div style="height:8px"></div>
    <label for="password">Mot de passe</label>
    <input id="password" name="password" type="password" required>
    <div style="height:14px"></div>
    <button class="btn" type="submit">Se connecter</button>
  </form>
</div>
</body>
</html>