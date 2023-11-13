<?php
include 'db_connection.php';
session_start();

// 세션에서 사용자 ID 가져오기
$userId = $_SESSION['user_id'];

// 세션에 이미 로드된 노래 목록이 있는지 확인
if (!isset($_SESSION['loaded_songs'])) {
    $_SESSION['loaded_songs'] = array(); // 세션 변수 초기화
}

$loadedSongs = $_SESSION['loaded_songs'];

// 사용자 ID에 해당하는 노래 중 새로운 노래만 가져오기
$selectQuery = "SELECT title FROM tb_song WHERE userId = '$userId' ORDER BY regdate";

$result = $conn->query($selectQuery);

$songTitles = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $title = $row['title'];

        // 이미 로드된 노래 목록에 없는 경우에만 추가
        if (!in_array($title, $loadedSongs)) {
            $songTitles[] = $title;
            $loadedSongs[] = $title; // 로드된 노래 목록에 추가
        }
    }
}

// 노래 제목 배열을 JSON 형식으로 출력
echo json_encode($songTitles);

$conn->close();
?>
