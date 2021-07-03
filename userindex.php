<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- <div class="navbar-header"><a class="navbar-brand" href="userselect.php">データ一覧</a></div> -->
                <div class="navbar-header"><a class="navbar-brand" href="login.php">登録済の方はこちら</a></div>
            </div>

        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="userinsert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>LReader ユーザー登録</legend>
                <label>名前：<input type="text" name="name"></label><br>
                <label>id名：<input type="text" name="lid"></label><br>
                <label>パスワード：<input type="text" name="lpw"></label><br>
                <!-- <input type="radio" name="kanri_flg" value="0">管理者
                <input type="radio" name="kanri_flg" value="1">スーパー管理者</><br>
                <input type="radio" name="life_flg" value="0">入社
                <input type="radio" name="life_flg" value="1">退社</><br> -->
                <input type="submit" value="新規登録">
            </fieldset>
        </div>
    </form>
</body>

</html>
