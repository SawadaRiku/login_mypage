<?php

session_start();
if(isset($_SESSION['id'])) {
    header("Location:mypage.php");
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページログインエラー</title>
    <link rel="stylesheet" type="text/css" href="login_error.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>
    <main>
        <form action="mypage.php" method="post">
            <div class="form_contents">
                <span style="color:#ff0000; background-color:#ffb6c1;">メールアドレスまたはパスワードが間違っています。</span>
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" value="<?php 
                    if(isset($_COOKIE['login_keep'])) {
                        echo $_COOKIE['mail'];
                    }
                    ?>" name="mail">
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="formbox" size="40" value="<?php
                    if(isset($_COOKIE['login_keep'])) {
                        echo $_COOKIE['password'];
                    }
                    ?>" name="password">
                </div>
                <div class="login_check">
                    <label><input type="checkbox" class="login_keep_formbox" size="40" name="login_keep" value="login_keep" <?php
                    if(isset($_COOKIE['login_keep'])) {
                        echo"checked='checked'";
                    }
                    ?>>ログイン状態を保持する</label>
                </div>
                <div class="loginbutton">
                    <input type="submit" class="submit_button" size="35" value="ログイン">
                </div>
            </div>
        </form>
    </main>
    <footer>© 2018 InterNous.inc. All rights reserved</footer>
</body>

</html>
