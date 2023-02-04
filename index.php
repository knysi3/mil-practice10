<?php
//SESSIONスタート
session_start();
$kanri_flg = "0";
$kanri_flg = $_SESSION['kanri_flg'];

$view="";

if($kanri_flg === "1") {
    $view .= '<div class="navbar-header"><a class="navbar-brand" href="user_reg.php">ユーザ登録</a></div>';
    $view .= '<div class="navbar-header"><a class="navbar-brand" href="select_user.php">ユーザ表示</a></div>';
}

?>

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
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="select_test.php">データ一覧（お試し）</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    <?= $view ?>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>書籍登録</legend>
      <div class="mb-3 row">
        <label for="inputBookName" class="col-sm-1 col-form-label">書籍名</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputBookName" name="book_name">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="inputUrl" class="col-sm-1 col-form-label">書籍URL</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputUrl" name="book_url">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="inputBookComment" class="col-sm-1 col-form-label">書籍コメント</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputBookComment" name="book_comment">
        </div>
      </div>
      
      <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
