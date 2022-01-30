<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id = $_GET['id'];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id=:id');
$stmt ->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt ->execute();

//4．データ表示
$view = '';

if ($status == false){
    sql_error($stmt);
}else{
    $result = $stmt->fetch();
}

?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍ブックマーク</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$result['name']?>"></label><br>
     <label>書籍URL：<input type="text" name="url" value="<?=$result['url']?>"></label><br>
     <label>一言紹介：<textArea name="naiyou" rows="4" cols="40"><?=$result['naiyou']?></textArea></label><br>
     <!-- <label>書籍写真：<input type="file" name="uploadfile" required></label><br>-->
     <input type="hidden" name="id" value="<?=$result['id']?>"> <!-- ユーザーには見せないが、裏側でどこのidを更新してデータを送るかを書いている  -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>