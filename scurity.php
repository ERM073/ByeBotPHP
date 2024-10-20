<?php
// セッションが開始されていない場合のみ開始
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cookieが存在しているか確認して、検証済みであればセッションに設定
if (isset($_COOKIE['validated']) && $_COOKIE['validated'] === 'true') {
    $_SESSION['validated'] = true;
}

// 検証が完了しているかどうかを確認
if (isset($_SESSION['validated']) && $_SESSION['validated'] === true) {
    return; // 検証済みならスクリプトを終了してコンテンツを表示
}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Seleniumである可能性が高い
    exit('Access blocked');
}

$userAgent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/selenium/i', $userAgent)) {
    exit('Access blocked');
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検証中</title>
    <!-- Tailwind CSSのCDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function validate() {
            document.getElementById("loading").style.display = "none";
            document.getElementById("verified").style.display = "block";
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "validate.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    window.location.href = window.location.href;
                }
            };
            xhr.send();
        }

        window.onload = function() {
            setTimeout(validate, 5000);
        };
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-r from-white-1000 to-blue-700 text-black p-8">
        <h1 class="text-3xl font-bold mb-4">検証中...</h1>
        <img src="https://github.com/ERM073/ByeBotPHP/blob/main/loading-dots-bouncing-dots.gif?raw=true" width="250" />
        <p id="loading" class="text-lg font-medium">検証を行っています。お待ちください...</p>
        <p id="loading" class="text-gray-700 font-medium">ページが1分以上切り替わらない場合はJavaScriptを有効化して、Cookieがブロックされていない事を確認してください。</p>
        <p id="verified" class="text-green-300 font-semibold hidden">検証が完了しました！</p>
    </div>
</body>
</html>
