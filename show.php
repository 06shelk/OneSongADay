<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
// 데이터베이스 연결
include('db_connection.php');

// 데이터베이스에서 이미지 경로 가져오기
$sql = "SELECT * FROM tb_board";
$result = mysqli_query($conn, $sql);

echo "<h1>업로드한 이미지</h1>";

while ($row = mysqli_fetch_assoc($result)) {
    $image_path = $row['image_path'];
    echo "<img src='$image_path' alt='이미지' style='max-width: 500px; max-height: 500px;'><br>";
}
?>
