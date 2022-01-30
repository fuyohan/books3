<?php
require_once('funcs.php');
$pdo = connectDB();

$sql = 'SELECT * FROM gs_bm_table WHERE id = :id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $gs_bm_table['image_type']);
echo $gs_an_table['image_content'];
exit();
?>