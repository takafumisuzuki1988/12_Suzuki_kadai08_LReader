<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();
$db_table = "tk_an_table";

//2.対象のIDを取得
$id = $_GET["id"];


//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM $db_table WHERE id=:id");  
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}

?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
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
        <button id="book_list_btn">見る </button>
        <a href="select.php"id="book_update_btn">一覧へ</a>
    </header>
    <form method="post" action="update.php">
        <dl id="input_form">
            <fieldset>
                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">本のタイトル</p>
                        </dt>
                        <dd>
                        <input type="text" id="book_title" name="title" value="<?= $result['title']?>">
                        </dd>
                        <button id="book_title_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">きっかけ・目的</p>
                            <p class="input_form_left_detail">・この本を読みたいと思った時の気持ち<br>・この本を読んで学びたいこと</p>
                        </dt>
                        <dd>
                            <textarea id="purpose" cols="100" rows="7" name="purpose" ><?= $result['purpose']?></textarea>
                        </dd>
                        <button id="book_purpose_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">気づき</p>
                            <p class="input_form_left_detail">・この本で印象的だったところ<br>・この本から学びたかったことへの回答</p>
                        </dt>
                        <dd>
                            <textarea id="finding" cols="100" rows="7" name="finding"><?= $result['finding']?></textarea>
                        </dd>
                        <button id="book_finding_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">これからやること</p>
                            <p class="input_form_left_detail">学びを踏まえて、、、<br>・明日からやってみること<br>・明日からやめてみること</p>
                        </dt>
                        <dd>
                            <textarea id="action" cols="100" rows="7" name="todo" ><?= $result['todo']?></textarea>
                        </dd>
                        <button id="book_action_btn" class="input_btn">登録</button>
                    </div>
                    
                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">振り返り１</p>
                            <p class="input_form_left_detail">・やってみてどうだったか？<br>➡気持ち・周囲の反応・発見, etc</p>
                        </dt>
                        <dd>
                            <textarea id="review1" cols="100" rows="7" name="review1" ><?= $result['review1']?></textarea>
                        </dd>
                        <button id="book_review1_btn" class="input_btn">登録</button>
                    </div>

                    <div class="input_form_each">
                        <dt class="input_form_left">
                            <p class="input_form_left_title">振り返り２</p>
                            <p class="input_form_left_detail">・やってみることは続けられている？<br>・本を読む前の自分との違いはある？</p>
                        </dt>
                        <dd>
                            <textarea id="review2" cols="100" rows="7" name="review2"><?= $result['review2']?></textarea>
                        </dd>
                        <button id="book_review2_btn" class="input_btn">更新</button>
                    </div>
                    <input type="hidden" name="id" value="<?= $result['id'] ?>">
                    <input id="send_btn" type="submit" value="更新">
            </fieldset>
        </dl>
    </form> 


</body>
</html>
