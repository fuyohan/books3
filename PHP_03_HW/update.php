<?php
//insert.phpの処理を持ってくる
//1. POSTデータ取得
$name = $_POST["name"];
$url = $_POST["url"];
$naiyou = $_POST["naiyou"];
//$image_name = $_FILES['uploadfile']['name'];
//$image_type = $_FILES['uploadfile']['type'];
//$image_content = $_FILES['uploadfile']['tmp_name'];
//$image_size = $_FILES['uploadfile']['size'];
$id = $_POST["id"];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）
$stmt = $pdo->prepare( 
    "UPDATE gs_bm_table SET name = :name, url = :url, naiyou = :naiyou, indate = sysdate() WHERE id = :id;" ); //ここでは一旦画像のアップデートは実装しない、もくもくで質問

$stmt->bindValue(':name', $name, PDO::PARAM_STR);/// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':url', $url, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);// 数値の場合 PDO::PARAM_INT
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
