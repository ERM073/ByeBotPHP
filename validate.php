<?php
// セッションがまだ開始されていない場合のみ開始
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 検証が完了したら、Cookieに保存する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie('validated', 'true', time() + 1800, "/"); // 30分後に期限切れ
    $_SESSION['validated'] = true;
    echo '検証完了';
}
?>
