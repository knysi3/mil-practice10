<?php
// 1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = password_hash($_POST['lpw'], PASSWORD_DEFAULT);

// 2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)
   VALUES(NULL, :name, :lid, :lpw, '0', '0')"
);

// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  header('Location: select_user.php');
}
?>
