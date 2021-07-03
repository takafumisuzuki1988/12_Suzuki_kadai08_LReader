<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。
function db_conn(){
    try {
        //localhost用  
          $db_name = "tk_db";
          $db_id = "root";
          $db_pw = "root";
          $db_host = "localhost";
        //   $db_table = "tk_an_table";
      
          //sakura server用（gitにアップするときは削除する！）
        //   $db_name = "limealpaca16_test";
        //   $db_id = "limealpaca16";
        //   $db_pw = "milsakura1229";
        //   $db_host = "mysql57.limealpaca16.sakura.ne.jp";
      
      
        //Password:MAMP='root',XAMPP=''
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
      }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//ログインチェック
function loginCheck(){
    if( $_SESSION["chk_ssid"] != session_id() ){
      exit('LOGIN ERROR');
    }else{
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
    }
  }