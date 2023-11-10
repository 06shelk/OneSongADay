<?php
include 'db_connection.php';

if(isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

// 한 페이지에 표시할 레코드 수
$records_per_page = 9;
$offset = ($page - 1) * $records_per_page;

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// tb_board에서 데이터 가져오기 (페이지네이션 적용)
$sql = "SELECT * FROM tb_board LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

// 데이터 출력
if ($result->num_rows > 0) {

    // 페이지네이션 버튼 생성
    $total_pages_sql = "SELECT COUNT(*) FROM tb_board";
    $result = $conn->query($total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $records_per_page);

    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='communityProcess1.php?page=".$i."'>".$i."</a> ";
    }
} else {
    echo "테이블에 데이터가 없습니다.";
}

// 연결 종료
$conn->close();
?>