<?php
$conn = mysqli_connect("localhost", "root", "mysqlP@ssword", "regist");

if(isset($_POST['boardID'])) {
    $boardID = (int)$_POST['boardID'];

    // 해당 boardID의 게시물의 좋아요 수를 증가시킵니다.
    $sqlUpdate = "UPDATE tb_board SET likes = likes + 1 WHERE boardID = $boardID";
    if ($conn->query($sqlUpdate) === TRUE) {
        // 증가된 좋아요 수를 반환합니다.
        $sqlGetLikes = "SELECT likes FROM tb_board WHERE boardID = $boardID";
        $result = $conn->query($sqlGetLikes);
        $row = $result->fetch_assoc();
        echo $row['likes'];
    } else {
        echo "Error: " . $sqlUpdate . "<br>" . $conn->error;
    }
}

$conn->close();
?>
