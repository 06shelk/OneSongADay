<?php
     // 페이지네이션 버튼 생성
     $total_pages_sql = "SELECT COUNT(*) FROM tb_board";
     $result = $conn->query($total_pages_sql);
     $total_rows = mysqli_fetch_array($result)[0];
     $total_pages = ceil($total_rows / $records_per_page);

    for ($i = 1; $i <= $total_pages; $i++) {
        // 현재 페이지일 때는 'page-number' 클래스를 추가합니다.
        if ($i == $page) {
            echo "<a href='communityProcess1.php?page=".$i."' class='page-number-selected'>".$i."</a> ";
        } else {
            echo "<a href='communityProcess1.php?page=".$i."' class='page-number>".$i."</a> ";
        }
    }
    
    $conn->close();
?>