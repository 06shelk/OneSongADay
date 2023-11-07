<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';

session_start(); // 세션 시작

$userid = $_POST['email'];
$password = $_POST['password'];

// 입력값이 비어있는지 확인
if(empty($userid) || empty($password)) {
    ?>
    <script>
        alert("로그인 시 이용 가능합니다.");
        location.href = "login.php";
    </script>
    <?php
    exit; // 입력값이 없으면 스크립트를 실행한 후 코드 실행 종료
}

// 파일 업로드 처리
if(isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileInput"]["name"]);

    // 파일 업로드 성공 여부 확인
    if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $targetFile)) {
        // 파일 업로드 성공 시 데이터베이스에 정보 삽입
        $imagePath = mysqli_real_escape_string($conn, $targetFile);

        // 게시글 삽입 쿼리
        $sql = "INSERT INTO tb_board(memberID, title, content, image)
                VALUES('{$username}', '{$_POST['boardTitle']}', '{$_POST['boardCont']}', '$imagePath')";

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
            //location.href = "boardProcess.php";
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("파일 업로드에 실패했습니다.");
        //location.href = "boardProcess.php";
    </script>
    <?php
}
?>
