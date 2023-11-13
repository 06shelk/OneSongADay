<?php
include 'db_connection.php';

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    // 세션이 없을 경우 로그인 페이지로 리디렉션
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 클라이언트에서 전송된 이미지의 링크를 받아옴
    $imageLink = $_POST['imageLink'];

    // 링크가 비어있는지 확인
    if (!empty($imageLink)) {
        // 링크가 비어있지 않으면 DB에 저장
        $userId = $_SESSION['user_id'];
        $sql = "UPDATE tb_user SET userimage = '$imageLink' WHERE useridx = $userId";

        // DB 연결 정보는 db_connection.php 파일에 정의되어 있다고 가정
        include 'db_connection.php';

        mysqli_begin_transaction($conn);

        if (mysqli_query($conn, $sql)) {
            mysqli_commit($conn);
            $response = array('status' => 'success', 'message' => '링크 경로 DB 저장 성공');
        } else {
            mysqli_rollback($conn);
            $response = array('status' => 'error', 'message' => 'DB 저장 실패: ' . mysqli_error($conn));
        }
    } else {
        $response = array('status' => 'error', 'message' => '이미지 링크가 비어 있습니다.');
    }

    // JSON 형식으로 응답
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // POST 요청이 아닌 경우 처리 (예: 다른 HTTP 메서드로의 요청)
    http_response_code(405); // Method Not Allowed
}
?>
