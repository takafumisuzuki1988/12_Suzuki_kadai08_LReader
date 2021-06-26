<?php
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$title = $_POST["title"];
$purpose = $_POST["purpose"];
$finding = $_POST["finding"];
$todo = $_POST["todo"];
$review1 = $_POST["review1"];
$review2 = $_POST["review2"];
$id = $_POST["id"];

// 2. DB接続します（データベース以外はワンパターン）
require_once('funcs.php');
$pdo = db_conn();
// try {
//   //デフォルトPassword:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=tk_db;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError:'.$e->getMessage());
// }


// ３．SQL文を用意(データ更新：UPDATE)
$stmt = $pdo->prepare(
  "UPDATE tk_an_table SET title=:title, purpose = :purpose,finding = :finding, todo = :todo, review1 = :review1, review2 = :review2 WHERE id = :id;"
);

// 4. バインド変数を用意（エスケープ処理というハッキング対策を行う）
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':purpose', $purpose, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':finding', $finding, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':review1', $review1, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':review2', $review2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect('select.php');
}
// if($status==false){
//   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
//   //以下を関数化
//   sql_error($stmt);
// }else{
//   //５．select.phpへリダイレクト
//   //以下を関数化
//   redirect('select.php');
// }
?>
