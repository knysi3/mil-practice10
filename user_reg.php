<?php
//SESSIONスタート
session_start();

require_once('funcs.php');
loginCheck();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">トップページ</a></div>
  </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert_user.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザ登録</legend>
      <div class="mb-3 row">
        <label for="inputBookName" class="col-sm-1 col-form-label">名前</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputBookName" name="name">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="inputUrl" class="col-sm-1 col-form-label">ID</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputUrl" name="lid">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="inputBookComment" class="col-sm-1 col-form-label">パスワード</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="inputBookComment" name="lpw">
        </div>
      </div>
      
      <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
