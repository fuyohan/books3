<?php
//1. POSTデータ取得
$name = $_POST["name"];
$url = $_POST["url"];
$naiyou = $_POST["naiyou"];

//画像データは登録までできたが、アップデート実装ができないため、一旦コメントアウト
//$image_name = $_FILES['uploadfile']['name'];
//$image_type = $_FILES['uploadfile']['type'];
//$image_content = $_FILES['uploadfile']['tmp_name'];
//$image_size = $_FILES['uploadfile']['size'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．SQL文を用意(データ登録：INSERT)

//画像無しの場合
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table( id, name, url, naiyou, indate)
  VALUES( NULL, :name, :url, :naiyou, sysdate())"
);

//画像付きの場合
//$stmt = $pdo->prepare(
  //"INSERT INTO gs_bm_table( id, name, url, naiyou, indate, image_name, image_type, image_content, image_size)
  //VALUES( NULL, :name, :url, :naiyou, sysdate(),:image_name,:image_type, :image_content, :image_size)"
//);

// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':image_name', $image_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':image_type', $image_type, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':image_content', $image_content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
//$stmt->bindValue(':image_size', $image_size, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. （SQL文の？）実行
$status = $stmt->execute();

//6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect('index.php');
}
?>
