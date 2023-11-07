<?php
    $host = "localhost"; // MySQL 호스트 주소
    $username = "root"; // MySQL 사용자명
    $password = "mysqlP@ssword"; // MySQL 비밀번호
    $database = "regist"; // 사용할 데이터베이스명

    // MySQL 데이터베이스에 연결
    $conn = new mysqli($host, $username, $password, $database);

    // 연결 오류가 발생한 경우 오류 메시지 출력
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>