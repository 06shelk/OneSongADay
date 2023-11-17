<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';

session_start(); // 세션 시작

// 파일 업로드 처리
if(isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";

    // 원본 파일명 가져오기
    $originalFileName = basename($_FILES["fileInput"]["name"]);

    // 파일 확장자 가져오기
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // 허용된 이미지 파일 확장자 배열
    $allowedExtensions = ['jpeg', 'jpg', 'gif', 'bmp', 'png'];

    // 파일 확장자가 허용된 확장자인지 확인
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        ?>
        <script>
            alert("이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다.");
            location.href = "board.php";
        </script>
        <?php
        exit;
    }

    // 타임스탬프를 추가하여 유니크한 파일명 생성
    $uniqueFileName = time() . '_' . $originalFileName;

    $targetFile = $targetDir . $uniqueFileName;

    // 파일 업로드 성공 여부 확인
    if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $targetFile)) {
        // 파일 업로드 성공 시 데이터베이스에 정보 삽입
        $imagePath = mysqli_real_escape_string($conn, $targetFile);

        $tb_username = $_SESSION['username'];
        $tb_userimage = $_SESSION['userimage'];

        // 게시글 삽입 쿼리
        $sql = "INSERT INTO tb_board(memberID, title, content, image, userimage)
                VALUES('{$tb_username}', '{$_POST['boardTitle']}', '{$_POST['boardCont']}', '$imagePath', '{$tb_userimage}')";

        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            ?>
            <script>
                alert("값을 저장하는데 문제가 발생했습니다.");
                //location.href = "boardProcess.php";
            </script>
            <?php
            echo mysqli_error($conn);
        } else {
            ?>
            <script>
                alert("값을 성공적으로 넣었습니다.");
                location.href = "communityProcess1.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("파일 업로드에 실패했습니다.");
            location.href = "communityProcess1.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("파일 업로드에 실패했습니다.");
        location.href = "communityProcess1.php";
    </script>
    <?php
}
?>
