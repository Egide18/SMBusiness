<?php
require_once __DIR__ . '/config.php';
session_start();
if (!isset($_SESSION['aid'])) { http_response_code(403); exit('Forbidden'); }

try { $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]); }
catch(Throwable $e) { http_response_code(500); exit('DB error'); }

$service = $_GET['service'] ?? '';
$q = trim($_GET['q'] ?? '');
$from = $_GET['from'] ?? '';
$to   = $_GET['to'] ?? '';

$where=[]; $params=[];
if ($service && in_array($service,['Kinesitherapie','Soins','Massage','Aines'],true)) { $where[]='service = :svc'; $params[':svc']=$service; }
if ($q !== '') { $where[]='(nom_complet LIKE :q OR telephone LIKE :q OR adresse LIKE :q)'; $params[':q']="%$q%"; }
if ($from && preg_match('/^\d{4}-\d{2}-\d{2}$/',$from)) { $where[]='DATE(created_at) >= :from'; $params[':from']=$from; }
if ($to && preg_match('/^\d{4}-\d{2}-\d{2}$/',$to)) { $where[]='DATE(created_at) <= :to'; $params[':to']=$to; }

$sql='SELECT * FROM consultations'.($where?' WHERE '.implode(' AND ',$where):'').' ORDER BY created_at DESC';
$st=$pdo->prepare($sql); $st->execute($params);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="consultations.csv"');

$out=fopen('php://output','w');
fputcsv($out,['id','created_at','nom_complet','genre','date_naissance','lieu_naissance','telephone','adresse','service','seances','paiement','details']);
while($r=$st->fetch(PDO::FETCH_ASSOC)){
  fputcsv($out,[$r['id'],$r['created_at'],$r['nom_complet'],$r['genre'],$r['date_naissance'],$r['lieu_naissance'],$r['telephone'],$r['adresse'],$r['service'],$r['seances'],$r['paiement'],$r['details']]);
}
fclose($out);