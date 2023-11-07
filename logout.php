<?php
// 로그아웃 기능
session_start(); // 세션 시작

// 모든 세션 변수 제거
session_unset();

// 세션 파기
session_destroy();

// 로그아웃 후 로그인 페이지로 리디렉션
header("Location: login.php");
exit;
?>