<?php
session_start();

// セキュリティチェック呼び出し
include 'scurity.php';

// もし検証が通っていない場合、スクリプトを終了する
if (!isset($_SESSION['validated']) || $_SESSION['validated'] !== true) {
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>可愛い猫のホームページ</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; /* 薄いピンク */
            font-family: 'Poppins', sans-serif;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #ff4081; /* 濃いピンク */
        }

        p {
            font-size: 1.2em;
            margin-bottom: 40px;
            color: #5c6bc0; /* 薄い水色 */
        }

        img {
            max-width: 80%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        button {
            background-color: #ff4081; /* 濃いピンク */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
        }

        button:hover {
            background-color: #e91e63; /* マウスオーバー時の色 */
        }
    </style>
    <script>
        function deleteCookies() {
            // 全てのCookieを削除
            document.cookie.split(";").forEach(function(c) { 
                document.cookie = c.split("=")[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/"; 
            });
            alert("Cookieが削除されました。ページを再読み込みします。");
            // ページを自動で再読み込み
            location.reload();
        }
    </script>
</head>
<body>
    <h1>ByeBotPHPテストページ</h1>
    <p>ByeBotPHPはあなたのWebページをスパムBotからお守りします</p>
    <img src="https://cataas.com/cat" alt="可愛い猫" width="250">
    <p>もう一度セキュリティ検証を試したい場合は、Cookieを削除してください。</p>
    
    <!-- Cookie削除ボタン -->
    <button onclick="deleteCookies()">Cookieを削除</button>
    
    <a href="https://github.com/ERM073/ByeBotPHP/" target="new">
        <p>ByeBotPHPのダウンロードはこちら</p>
        <img src="https://cdn-icons-png.flaticon.com/512/3291/3291667.png" width="100" />
    </a>
</body>
</html>
