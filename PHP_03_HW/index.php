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
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍ブックマーク</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>書籍URL：<input type="text" name="url"></label><br>
     <label>一言紹介：<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <!--<label>書籍写真：<input type="file" name="uploadfile" required></label><br>-->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
