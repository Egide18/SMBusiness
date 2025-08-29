<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

require_once __DIR__ . '/config.php';

function respond($ok, $msg, $data=null, $code=200){
  http_response_code($code);
  echo json_encode(['ok'=>$ok,'message'=>$msg,'data'=>$data], JSON_UNESCAPED_UNICODE);
  exit;
}

$input = $_POST;
if (!$input) {
  $raw = file_get_contents('php://input');
  if ($raw) $input = json_decode($raw, true) ?: [];
}

$required = ['nomComplet','genre','naissanceDate','naissanceLieu','telephone','adresse','service','seances','paiement'];
foreach ($required as $k) {
  if (!isset($input[$k]) || trim((string)$input[$k])==='') respond(false, "Champ manquant: $k", null, 422);
}

try {
  $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
} catch(Throwable $e) { respond(false, 'Erreur base de données', null, 500); }

$genreOptions   = ['Masculin','Féminin','Autre / Préfère ne pas dire'];
$serviceOptions = ['Kinesitherapie','Soins','Massage','Aines'];
$paiementOptions= ['Airtel Money','MPesa','EquityBCDC'];
$seancesOptions = [5,10,15,20,25,30,40,50];

$nom = trim($input['nomComplet']);
$genre = $input['genre'];
$dn = $input['naissanceDate'];
$ln = trim($input['naissanceLieu']);
$tel = preg_replace('/[^0-9+\s]/','', (string)$input['telephone']);
$adr = trim($input['adresse']);
$svc = $input['service'];
$nb  = (int)$input['seances'];
$pay = $input['paiement'];
$det = isset($input['details']) ? trim((string)$input['details']) : null;

if (!in_array($genre,$genreOptions,true)) respond(false,'Genre invalide',null,422);
if (!in_array($svc,$serviceOptions,true)) respond(false,'Service invalide',null,422);
if (!in_array($pay,$paiementOptions,true)) respond(false,'Paiement invalide',null,422);
if (!in_array($nb,$seancesOptions,true)) respond(false,'Nombre de séances invalide',null,422);
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/',$dn)) respond(false,'Date de naissance invalide (YYYY-MM-DD)',null,422);
if (strlen($tel) < 8) respond(false,'Téléphone invalide',null,422);

$sql = "INSERT INTO consultations
(nom_complet, genre, date_naissance, lieu_naissance, telephone, adresse, service, seances, paiement, details, source)
VALUES (:nom,:genre,:dn,:ln,:tel,:adr,:svc,:nb,:pay,:det,:src)";
$st = $pdo->prepare($sql);
$st->execute([
  ':nom'=>$nom, ':genre'=>$genre, ':dn'=>$dn, ':ln'=>$ln, ':tel'=>$tel, ':adr'=>$adr,
  ':svc'=>$svc, ':nb'=>$nb, ':pay'=>$pay, ':det'=>$det, ':src'=>'site-web'
]);

///respond(true, 'Demande enregistrée', ['id'=>$pdo->lastInsertId()]);

header("Location:home.php");
exit;

?>
