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

// 2. DB接続します（データベース以外はワンパターン）
try {
    //localhost用  
    $db_name = "tk_db";
    $db_id = "root";
    $db_pw = "root";
    $db_host = "localhost";
    $db_table = "tk_an_table";

    //sakura server用（gitにアップするときは削除する！）
        //   $db_name = "";
        //   $db_id = "";
        //   $db_pw = "";
        //   $db_host = "";
        //   $db_table = "";

  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO $db_table(id, title, purpose, finding, todo, review1, review2)
  VALUES(NULL,:title,:purpose,:finding,:todo, :review1,:review2)"
);

// 4. バインド変数を用意（エスケープ処理というハッキング対策を行う）
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':purpose', $purpose, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':finding', $finding, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':review1', $review1, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':review2', $review2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: index.php');
}
?>
