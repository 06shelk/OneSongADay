<?php
include 'db_connection.php'; // DB 연결 설정 파일을 포함합니다.
session_start(); // 세션 시작

$userId = $_SESSION['user_id']; // 현재 로그인된 사용자의 ID

// 사용자 ID에 해당하는 노래 제목을 가져오는 SQL 쿼리
$selectQuery = "SELECT title FROM tb_song WHERE userId = '$userId' ORDER BY title";

$result = $conn->query($selectQuery);

$songTitles = array();

if ($result->num_rows > 0) {
    // 결과에서 각 행을 반복하여 노래 제목을 가져와서 배열에 추가
    while($row = $result->fetch_assoc()) {
        $songTitles[] = $row['title'];
    }
}


// 노래 제목 배열을 JSON 형식으로 출력
echo json_encode($songTitles);



$conn->close();
?>
