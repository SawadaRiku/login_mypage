<?php

mb_internal_encoding("utf8");

session_start();

//mypage.phpからの導線以外は、login_error.phpへリダイレクト
if(empty($_POST['from_mypage'])) {
    header("Location:login_error.php");
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ編集</title>
    <link rel="stylesheet" href="mypage_hensyu2.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>
    <main>
        <div class="form_contents">
            <h2>会員情報</h2>
            <div class="hello">
                <?php echo "こんにちは！".$_SESSION['name']."さん"; ?>
            </div>
            <div class=info_all>
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture']; ?>">
                </div>
                <div class="basic_info">
                    <form action="mypage_update.php" method="post">
                        <p class="name">氏名：</p><input type="text" class="formbox" size="15" name="name" value="<?php echo $_SESSION['name'] ?>" required><br>
                        <p class="mail">メール：</p><input type="text" class="formbox" size="30" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail'] ?>" required><br>
                        <p class="password">パスワード：</p><input type="password" class="formbox" size="15" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password'] ?>" required>
                        <hr>
                        <div class="comments"><textarea name="comments" cols="65" rows="4"><?php echo $_SESSION['comments']; ?></textarea></div>
                        <div class="toroku">
                            <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>© 2018 InterNous.inc. All rights reserved</footer>
</body>

</html>
