<?php
//SESSIONスタート
session_start();

//2.DB接続します
require_once('funcs.php');

//ログインチェック
loginCheck();

//1.対象のIDを取得
$id = $_GET["id"];

$pdo = db_conn();

//3.削除SQLを作成
$stmt = $pdo->prepare( "DELETE FROM gs_bm_table WHERE id = :id" );
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ削除処理後
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    redirect('select.php');
}

?>