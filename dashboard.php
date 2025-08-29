<?php
require_once __DIR__ . '/config.php';
session_start();
if (!isset($_SESSION['aid'])) { header('Location: login.php'); exit; }

try { $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]); }
catch(Throwable $e) { die('Erreur base de données'); }

$service = $_GET['service'] ?? '';
$q = trim($_GET['q'] ?? '');
$from = $_GET['from'] ?? '';
$to   = $_GET['to'] ?? '';

$where = []; $params = [];
if ($service && in_array($service,['Kinesitherapie','Soins','Massage','Aines'],true)) { $where[]='service = :svc'; $params[':svc']=$service; }
if ($q !== '') { $where[]='(nom_complet LIKE :q OR telephone LIKE :q OR adresse LIKE :q)'; $params[':q']="%$q%"; }
if ($from && preg_match('/^\d{4}-\d{2}-\d{2}$/',$from)) { $where[]='DATE(created_at) >= :from'; $params[':from']=$from; }
if ($to && preg_match('/^\d{4}-\d{2}-\d{2}$/',$to)) { $where[]='DATE(created_at) <= :to'; $params[':to']=$to; }

$sql = 'SELECT * FROM consultations'.($where?' WHERE '.implode(' AND ',$where):'').' ORDER BY created_at DESC LIMIT 1000';
$st = $pdo->prepare($sql); $st->execute($params); $rows = $st->fetchAll(PDO::FETCH_ASSOC);

$stats = ['total'=>0,'Kinesitherapie'=>0,'Soins'=>0,'Massage'=>0,'Aines'=>0];
foreach($rows as $r){ $stats['total']++; $stats[$r['service']]++; }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard — SM BUSINESS Private Care</title>
<link rel="icon" href="assets/logo.png">
<style>
:root{
  --ink:#0f0f10; --accent:#1f2937; --bg:#f7f7f8; --muted:#6b7280; --card:#ffffff; --border:#e5e7eb; --ring:0 0 0 3px rgba(31,41,55,.2)
}
*{box-sizing:border-box} body{margin:0;font-family:system-ui,Segoe UI,Roboto,Arial;background:var(--bg);color:var(--ink)}
.container{max-width:1200px;margin:0 auto;padding:16px}
.header{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:12px 0}
.brand{display:flex;align-items:center;gap:12px}
.logo-img{height:44px}
.brand-title{font-weight:900;letter-spacing:.3px}
.actions a{background:var(--ink);color:#fff;border:none;padding:10px 12px;border-radius:10px;text-decoration:none}
.actions a:hover{filter:brightness(1.05)}
.card{background:var(--card);border:1px solid var(--border);border-radius:14px;padding:14px}
.grid{display:grid;gap:12px}
.grid.two{grid-template-columns:1fr 1fr}
.grid.auto{grid-template-columns:repeat(auto-fit,minmax(260px,1fr))}
label{font-size:14px;font-weight:600}
input,select{width:100%;padding:10px;border-radius:10px;border:1px solid var(--border);background:#fff}
input:focus,select:focus{outline:none;box-shadow:var(--ring)}
.table{width:100%;border-collapse:collapse}
.table th,.table td{padding:10px;border-bottom:1px solid var(--border);text-align:left;vertical-align:top}
.table th{font-size:13px;color:var(--muted)}
.badge{display:inline-block;padding:4px 8px;border-radius:999px;background:#111827;color:#fff;font-size:12px}
.stat{display:flex;align-items:center;justify-content:space-between;border:1px dashed var(--border);border-radius:10px;padding:12px;background:#fcfcfd}
.footer{margin-top:20px;color:var(--muted);font-size:12px;text-align:center}
@media (max-width:720px){ .grid.two{grid-template-columns:1fr} }
</style>
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="brand">
        <img src="assets/logo.png" alt="SM Business Logo" class="logo-img" onerror="this.style.display='none'">
        <div>
          <div class="brand-title">SM BUSINESS PRIVATE CARE</div>
          <small style="color:var(--muted)">Dashboard des consultations</small>
        </div>
      </div>
      <div class="actions">
        <a href="export_csv.php?<?= htmlspecialchars(http_build_query($_GET)) ?>">Exporter CSV</a>
        <a href="logout.php">Déconnexion</a>
      </div>
    </header>

    <section class="card">
      <form method="get" class="grid two">
        <div class="grid auto">
          <div>
            <label for="q">Recherche</label>
            <input id="q" name="q" type="text" placeholder="Nom, téléphone, adresse" value="<?= htmlspecialchars($q) ?>">
          </div>
          <div>
            <label for="service">Service</label>
            <select id="service" name="service">
              <option value="">Tous</option>
              <?php
                $opts = ['Kinesitherapie'=>'Kinésithérapie','Soins'=>'Soins infirmiers','Massage'=>'Massage','Aines'=>'Prise en charge'];
                foreach($opts as $val=>$lab){ $sel=$service===$val?'selected':''; echo "<option value=\"$val\" $sel>$lab</option>"; }
              ?>
            </select>
          </div>
          <div>
            <label for="from">Du</label>
            <input id="from" name="from" type="date" value="<?= htmlspecialchars($from) ?>">
          </div>
          <div>
            <label for="to">Au</label>
            <input id="to" name="to" type="date" value="<?= htmlspecialchars($to) ?>">
          </div>
        </div>
        <div style="align-self:end">
          <button type="submit" style="width:100%;padding:12px;border:none;border-radius:10px;background:var(--ink);color:#fff;font-weight:700">Filtrer</button>
        </div>
      </form>
    </section>

    <section class="grid auto" style="margin-top:12px">
      <div class="stat"><span>Total</span><strong><?= (int)$stats['total'] ?></strong></div>
      <div class="stat"><span>Kinésithérapie</span><strong><?= (int)$stats['Kinesitherapie'] ?></strong></div>
      <div class="stat"><span>Soins</span><strong><?= (int)$stats['Soins'] ?></strong></div>
      <div class="stat"><span>Massage</span><strong><?= (int)$stats['Massage'] ?></strong></div>
      <div class="stat"><span>Aînés</span><strong><?= (int)$stats['Aines'] ?></strong></div>
    </section>

    <section class="card" style="margin-top:12px;overflow:auto">
      <table class="table">
        <thead>
          <tr>
            <th>#</th><th>Date</th><th>Patient</th><th>Genre</th><th>Naissance</th><th>Téléphone</th><th>Adresse</th><th>Service</th><th>Séances</th><th>Paiement</th><th>Détails</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($rows): foreach($rows as $r): ?>
            <tr> <!-----Recupérer l'id qui est en UUID------>

              <td><?= htmlspecialchars($r['id']) ?></td>
              <td><?= htmlspecialchars($r['created_at']) ?></td>
              <td><?= htmlspecialchars($r['nom_complet']) ?></td>
              <td><?= htmlspecialchars($r['genre']) ?></td>
              <td><?= htmlspecialchars($r['date_naissance'].' à '.$r['lieu_naissance']) ?></td>
              <td><?= htmlspecialchars($r['telephone']) ?></td>
              <td><?= htmlspecialchars($r['adresse']) ?></td>
              <td><span class="badge"><?= htmlspecialchars($r['service']) ?></span></td>
              <td><?= (int)$r['seances'] ?></td>
              <td><?= htmlspecialchars($r['paiement']) ?></td>
              <td><?= htmlspecialchars($r['details'] ?? '') ?></td>
            </tr>
          <?php endforeach; else: ?>
            <tr><td colspan="11" style="color:var(--muted)">Aucune donnée.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </section>

    <div class="footer">By <a href="https://portfoliome.42web.io/">4ZEFLOWERS</a> © <?= date('Y') ?> SM BUSINESS PRIVATE CARE.</div>
  </div>
</body>
</html>