<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
    // db_connection.php 파일을 불러와서 연결 설정
    include 'db_connection.php';

    session_start(); // 세션 시작

    //onesongaday.php?id=숫자 이거 저장
    $_SESSION["oneSongUrl"] = $_SERVER['REQUEST_URI'];

?>