<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';
session_start();

// POST 데이터를 받아옴
$title = $_POST['title'];
$singer = $_POST['singer'];
$artistImage = $_POST['artistImage'];
$music = $_POST['music'];
$userId = $_SESSION['user_id']; // 사용자 ID를 받아옵니다.

// MySQL 데이터베이스에 데이터 추가하는 SQL 쿼리 실행
$insertQuery = "INSERT INTO tb_song (title, singer, artistImage, music, userId) VALUES ('$title', '$singer', '$artistImage', '$music', '$userId')";

if ($conn->query($insertQuery) === TRUE) {
    echo "Data added successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
}


// DB에서 노래 제목이 중복되지 않는지 확인하는 SQL 쿼리 실행
$checkDuplicateQuery = "SELECT title FROM tb_song WHERE title = '$title' AND userId = '$userId'";
$duplicateResult = $conn->query($checkDuplicateQuery);
$songTitles = array();

// 중복된 제목이 없을 때만 노래를 추가
if ($duplicateResult->num_rows == 0) {
    // MySQL 데이터베이스에 데이터 추가하는 SQL 쿼리 실행
    $insertQuery = "INSERT INTO tb_song (title, singer, artistImage, music, userId) VALUES ('$title', '$singer', '$artistImage', '$music', '$userId')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Data added successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
} else {
    echo "Duplicate title. Cannot add the song.";
}

$conn->close();
?>
