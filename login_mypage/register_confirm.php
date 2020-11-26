<?php
mb_internal_encoding("utf8");

//仮保存されたファイル名で画像ファイルを取得（サーバーへ仮アップロードされたディレクトリとファイル名）
$temp_pic_name = $_FILES['picture']['tmp_name'];

//元のファイル名で画像ファイルを取得。事前に画像を格納する「image」という名前のフォルダを作成しておく必要あり
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

//仮保存のファイル名を、imageフォルダに、元のファイル名で移動させる
move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ登録確認</title>
    <link rel="stylesheet" type="text/css" href="register_confirm2.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
    </header>
    
    <main>
        <div class="box">
            <div class="form_contents">
                <h2>会員登録 確認</h2>
                <p class="kakuninbun">こちらの内容で登録しても宜しいでしょうか？</p>
                <div class="name">
                    <p>氏名：<?php echo ($_POST['name']); ?></p>
                </div>
                <div class="mail">
                    <p>メール：<?php echo ($_POST['mail']); ?></p>
                </div>
                <div class="password">
                    <p>パスワード：<?php echo ($_POST['password']); ?></p>
                </div>
                <div class="picture">
                    <p>プロフィール写真：<?php echo $original_pic_name; ?></p>
                </div>
                <div class="comments">
                    <p>コメント：<?php echo ($_POST['comments']); ?></p>
                </div>
                <div class="toroku">
                    <form action="register.php">
                        <input type="submit" class="submit_button2" value="戻って修正する" />
                    </form>

                    <form action="register_insert.php" method="post">
                        <input type="submit" class="submit_button" value="登録する" />
                        <input type="hidden" value="<?php echo ($_POST['name']); ?>" name="name">
                        <input type="hidden" value="<?php echo ($_POST['mail']); ?>" name="mail">
                        <input type="hidden" value="<?php echo ($_POST['password']); ?>" name="password">
                        <input type="hidden" value="<?php echo ($path_filename); ?>" name="path_filename">
                        <input type="hidden" value="<?php echo ($_POST['comments']); ?>" name="comments">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>© 2018 InterNous.inc. All rights reserved</footer>
</body>

</html>
