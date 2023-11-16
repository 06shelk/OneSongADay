<?php
// db_connection.php 파일에는 데이터베이스 연결 정보가 있어야 합니다.
include 'db_connection.php';

// 세션 시작
session_start();

if ($_FILES["image"] && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // 업로드된 이미지를 읽어오기
    $image = file_get_contents($_FILES["image"]["tmp_name"]);

    // 이미지를 데이터베이스에 저장
    $query = "UPDATE tb_user SET userimage = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);

    // 바인딩 매개변수 설정
    mysqli_stmt_bind_param($stmt, "sb", $image, $user_id);

    // 쿼리 실행
    $result = mysqli_stmt_execute($stmt);

    // 쿼리 성공 여부 확인
    if ($result) {
        echo json_encode(["success" => "이미지가 데이터베이스에 저장되었습니다"]);
    } else {
        echo json_encode(["error" => "이미지를 데이터베이스에 저장하는 데 실패했습니다"]);
    }

    // 문을 닫습니다.
    mysqli_stmt_close($stmt);
} else {
    echo json_encode(["error" => "파일이나 사용자 ID가 전송되지 않았습니다"]);
}
?>
