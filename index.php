<?php
//funcsの関数を読み込む
require_once('funcs.php');

//1.  DB接続します
try {
  //localhost用  
    $db_name = "tk_db";
    $db_id = "root";
    $db_pw = "root";
    $db_host = "localhost";
    $db_table = "tk_an_table";

    //sakura server用（gitにアップするときは削除する！）
    // $db_name = "limealpaca16_test";
    // $db_id = "limealpaca16";
    // $db_pw = "milsakura1229";
    // $db_host = "mysql57.limealpaca16.sakura.ne.jp";
    // $db_table = "tk_table_1";

  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM $db_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
$resultArr = [];
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<option>";
    $view .= h($result['title']);
    $view .= "</option>";
    array_push($resultArr,$result);
  }
  $json .= json_encode($resultArr, JSON_UNESCAPED_UNICODE);

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/sample2.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
    <!-- 入力欄 -->
    <header>
        <div>
            <p id="main_title">L/Reader ～読むだけじゃ終われない～</p>
        </div>
        <div id="lists">
            <select id="book_list">
                <?= $view ?>
            </select>
            <button id="book_list_btn">見る </button>
            <a href="select.php"id="book_update_btn">一覧へ</a>
        </div>
    </header>
    <form method="post" action="insert.php">
        <dl id="input_form">
            <fieldset>
                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">本のタイトル</p>
                        </dt>
                        <dd>
                        <input type="text" id="book_title" name="title">
                        </dd>
                        <button id="book_title_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">きっかけ・目的</p>
                            <p class="input_form_left_detail">・この本を読みたいと思った時の気持ち<br>・この本を読んで学びたいこと</p>
                        </dt>
                        <dd>
                            <textarea id="purpose" cols="100" rows="7" name="purpose"></textarea>
                        </dd>
                        <button id="book_purpose_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">気づき</p>
                            <p class="input_form_left_detail">・この本で印象的だったところ<br>・この本から学びたかったことへの回答</p>
                        </dt>
                        <dd>
                            <textarea id="finding" cols="100" rows="7" name="finding"></textarea>
                        </dd>
                        <button id="book_finding_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">これからやること</p>
                            <p class="input_form_left_detail">学びを踏まえて、、、<br>・明日からやってみること<br>・明日からやめてみること</p>
                        </dt>
                        <dd>
                            <textarea id="action" cols="100" rows="7" name="todo"></textarea>
                        </dd>
                        <button id="book_action_btn" class="input_btn">登録</button>
                    </div>
                    
                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">振り返り１</p>
                            <p class="input_form_left_detail">・やってみてどうだったか？<br>➡気持ち・周囲の反応・発見, etc</p>
                        </dt>
                        <dd>
                            <textarea id="review1" cols="100" rows="7" name="review1"></textarea>
                        </dd>
                        <button id="book_review1_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">振り返り２</p>
                            <p class="input_form_left_detail">・やってみることは続けられている？<br>・本を読む前の自分との違いはある？</p>
                        </dt>
                        <dd>
                            <textarea id="review2" cols="100" rows="7" name="review2"></textarea>
                        </dd>
                        <button id="book_review2_btn" class="input_btn">登録</button>
                    </div>
                    <input id="send_btn" type="submit" value="送信">
            </fieldset>
        </dl>
    </form> 


</body>
</html>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JQuery -->

<script>
var parseJson = function(jsonString) {
  var converted = convertNl(jsonString);
  return JSON.parse(converted);
};

var convertNl = function(jsonString) {
  return jsonString
    .replace(/(\r\n)/g, '\n')
    .replace(/(\r)/g,   '\n')
    .replace(/(\n)/g,  '\\n');
};

const data = parseJson('<?=$json?>');
console.log(data);

$("#book_list_btn").on("click",function(){    
        
    const book_title_miru = $("#book_list").val();
    console.log(book_title_miru);
    $("#book_title").val(book_title_miru); 
    $("#purpose").val("");
    $("#finding").val("");
    $("#action").val("");
    $("#review1").val("");
    $("#review2").val("");

    var book_title_Ref = data.find(element => element.title === book_title_miru);
    console.log(book_title_Ref);
    let pu = book_title_Ref.purpose;
    $("#purpose").val(pu);

    let fi = book_title_Ref.finding;
    $("#finding").val(fi);

    let to = book_title_Ref.todo;
    $("#action").val(to);

    let re1 = book_title_Ref.review1;
    $("#review1").val(re1);

    let re2 = book_title_Ref.review2;
    $("#review2").val(re2);

})

</script>
