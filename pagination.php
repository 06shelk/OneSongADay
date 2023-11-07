<?php
// DB 연결 설정
$dbConnect = mysqli_connect("localhost", "root", "mysqlP@ssword", "regist");

// 오류 처리
if ($dbConnect->connect_error) {
    die("Connection failed: " . $dbConnect->connect_error);
}

// 현재 페이지 수를 가져옵니다. 기본값은 1입니다.
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 한 페이지에 표시할 레코드 수
$numView = 10;

// 전체 레코드 수 구하기
$sql = "SELECT count(boardID) as total FROM board";
$result = $dbConnect->query($sql);
$boardTotalCount = $result->fetch_assoc();
$boardTotalCount = $boardTotalCount['total'];

// 총 페이지 수
$totalPage = ceil($boardTotalCount / $numView);

// 처음 페이지 이동 링크
echo "<a href='./communityProcess1.php?page=1'>처음</a>&nbsp;";

// 이전 페이지 이동 링크
if ($page != 1) {
    $previousPage = $page - 1;
    echo "<a href='./communityProcess1.php?page={$previousPage}'>이전</a>";
}

// 현재 페이지의 앞 뒤 페이지 수 표시
$pageTerm = 5;
$startPage = max(1, $page - $pageTerm);
$endPage = min($totalPage, $page + $pageTerm);

for ($i = $startPage; $i <= $endPage; $i++) {
    $nowPageColor = 'unset';
    if ($i == $page) {
        $nowPageColor = 'hotpink';
    }
    echo "&nbsp;<a href='./communityProcess1.php?page={$i}' style='color:{$nowPageColor}'>{$i}</a>&nbsp;";
}

// 다음 페이지 이동 링크
if ($page != $totalPage) {
    $nextPage = $page + 1;
    echo "<a href='./communityProcess1.php?page={$nextPage}'>다음</a>";
}

// 마지막 페이지 이동 링크
echo "&nbsp;<a href='./communityProcess1.php?page={$totalPage}'>끝</a>";

// DB 연결 해제
$dbConnect->close();
?>
