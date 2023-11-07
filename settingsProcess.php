<?php
include 'db_connection.php';

$uploadDir = 'userImg/';

// 세션 값 확인
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo json_encode(array('success' => false, 'message' => '세션에 유저 정보가 없습니다.'));
    exit();
}

// 디버깅을 위한 출력
echo "세션에 저장된 username: " . $username . "<br>";

if ($_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
    $tmpFilePath = $_FILES['imageFile']['tmp_name'];
    $decodedFileName = urldecode($_POST['encodedFileName']);
    $uploadFilePath = $uploadDir . $decodedFileName;

    // 디버깅을 위한 출력
    echo "파일 이름 (디코딩 전): " . $_POST['encodedFileName'] . "<br>";
    echo "파일 이름 (디코딩 후): " . $decodedFileName . "<br>";
    echo "업로드 경로: " . $uploadFilePath . "<br>";

    if (move_uploaded_file($tmpFilePath, $uploadFilePath)) {
        // 파일 업로드 성공
        $imagePath = mysqli_real_escape_string($conn, $uploadFilePath);

        // 세션에 이미지 경로 저장
        $_SESSION['userProfileImage'] = $imagePath;

        $updateQuery = "UPDATE tb_user SET userimage='$imagePath' WHERE username='$username'";
        if (mysqli_query($conn, $updateQuery)) {
            // 업데이트 성공
            echo json_encode(array('success' => true, 'message' => '프로필 사진이 업로드되었습니다.'));
        } else {
            // 업데이트 실패
            echo json_encode(array('success' => false, 'message' => '데이터베이스 업데이트에 실패했습니다.'));
        }
    } else {
        // 파일 이동 실패
        echo json_encode(array('success' => false, 'message' => '파일을 업로드할 수 없습니다.'));
    }
} else {
    // 파일 업로드 실패
    echo json_encode(array('success' => false, 'message' => '파일 업로드에 실패했습니다.'));
}



?>
