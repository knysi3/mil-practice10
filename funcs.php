<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    try {
      $db_name = "xxx";
      $db_id   = "xxx";
      $db_pw   = "xxx";
      $db_host = "xxx";
      $db_port = "xxx";
      $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host.';port='.$db_port.'', $db_id, $db_pw);
      return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header('Location: ' .$file_name);
}

//ログインチェック
function loginCheck(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("Login Error");
    }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"] = session_id();
    }
}
?>