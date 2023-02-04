<?php
//SESSIONスタート
session_start();

//1.  DB接続します
require_once('funcs.php');

//ログインチェック
loginCheck();

$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr>";
    $view .= '<td scope="row">'.$result['id'].'</td>';
    $view .= '<td scope="row">'.$result['name'].'</td>';
    $view .= '<td scope="row">'.$result['lid'].'</td>';
    $view .= '<td scope="row">'.$result['kanri_flg'].'</td>';
    $view .= '<td scope="row">'.$result['life_flg'].'</td>';

    $view .= '<td scope="row">';
    $view .= '<a href="details_user.php?id=' . $result['id'] . '" class="btn btn-primary">';
    $view .= '更新 工事中';
    $view .= '</a>';
    $view .= '</td>';

    $view .= '<td scope="row">';
    $view .= '<a href="delete_delete.php?id=' . $result['id'] . '" class="btn btn-primary">';
    $view .= '削除 工事中';
    $view .= '</a>';
    $view .= '</td>';

    $view .= "</tr>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザ一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">トップページ</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
<legend>ユーザ一覧</legend>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">名前</th>
      <th scope="col">ID</th>
      <th scope="col">管理フラグ</th>
      <th scope="col">ライフフラグ</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?= $view ?>
  </tbody>
</table>
</div>
<!-- Main[End] -->

</body>
</html>