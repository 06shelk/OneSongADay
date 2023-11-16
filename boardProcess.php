<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';

session_start(); // 세션 시작

// 파일 업로드 처리
if(isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileInput"]["name"]);

    // 파일 업로드 성공 여부 확인
    if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $targetFile)) {
        // 파일 업로드 성공 시 데이터베이스에 정보 삽입
        $imagePath = mysqli_real_escape_string($conn, $targetFile);

        $tb_username = $_SESSION['username'];
        $tb_userImage = $_SESSION['userImage'];

        // 게시글 삽입 쿼리
        $sql = "INSERT INTO tb_board(memberID, title, content, image, userimage)
                VALUES('{$tb_username}', '{$_POST['boardTitle']}', '{$_POST['boardCont']}', '$imagePath', '{$tb_userImage}')";

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
