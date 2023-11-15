<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';
session_start(); // 세션 시작

if(isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

date_default_timezone_set('Asia/Seoul'); // 한국 표준시로 설정

// 한 페이지에 표시할 레코드 수
$records_per_page = 9;
$offset = ($page - 1) * $records_per_page;

$tb_username = $_SESSION['username'];

// 사용자의 게시물을 가져옴
$sql = "SELECT * FROM tb_board";

// 정렬 방식을 확인하고 SQL 쿼리에 반영
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'latest';
if ($sort === 'latest') {
    $sql = "SELECT * FROM tb_board ORDER BY regdate DESC LIMIT $offset, $records_per_page";
} else if ($sort === 'popular') {
    $sql = "SELECT * FROM tb_board ORDER BY likes DESC LIMIT $offset, $records_per_page";
}

// tb_board에서 데이터 가져오기 (페이지네이션 적용)
$result = $conn->query($sql);

// 쿼리 실행 오류 처리
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/community1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script>
    //URL 이 test.com?user_name=test&id=tt
    //http://localhost/communityProcess1.php?sort=latest
    // 현재 페이지 URL을 가져옵니다.
    var url = window.location.href;

    // URL에서 "sort=latest" 매개변수 값을 가져오기 위한 정규식을 정의합니다.
    var regex = /[?&]sort(=([^&#]*)|&|#|$)/i;

    // URL에서 "sort=latest" 매개변수 값을 추출합니다.
    var match = regex.exec(url);
    var sortValue = match && decodeURIComponent(match[2].replace(/\+/g, ' '));


        // DOM이 로드된 후에 실행되는 JavaScript 코드
        document.addEventListener('DOMContentLoaded', function() {
    // 페이지 번호의 클래스명이 'page-number'인 요소들을 가져와서 색상을 변경
    var pageNumbers = document.querySelectorAll('.page-number-selected');
    for (var i = 0; i < pageNumbers.length; i++) {
        pageNumbers[i].style.color = '#c8c8c8';
    }

    // popular 버튼
    var popularButton = document.querySelector('.popular');
    popularButton.addEventListener('click', function() {
        // 서버에 popular 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=latest';
        // popular 버튼에 'selected' 클래스 추가, lastest 버튼의 'selected' 클래스 제거
        popularButton.classList.add('selected');
        var lastestButton = document.querySelector('.lastest');
        lastestButton.classList.remove('selected');
    });

    // lastest 버튼
    var lastestButton = document.querySelector('.lastest');
    lastestButton.addEventListener('click', function() {
        // 서버에 lastest 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=popular';
        // lastest 버튼에 'selected' 클래스 추가, popular 버튼의 'selected' 클래스 제거
        lastestButton.classList.add('selected');
        popularButton.classList.remove('selected');
    });

    // popular1 버튼
    var popular1Button = document.querySelector('.popular1');
    popular1Button.addEventListener('click', function() {
        // 서버에 popular 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=latest';
        // popular1 버튼에 'selected' 클래스 추가, lastest1 버튼의 'selected' 클래스 제거
        popular1Button.classList.add('selected');
        var lastest1Button = document.querySelector('.lastest1');
        lastest1Button.classList.remove('selected');
    });

    
    // lastest1 버튼
    var lastest1Button = document.querySelector('.lastest1');
    lastest1Button.addEventListener('click', function() {
        // 서버에 lastest 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=popular';
        // lastest1 버튼에 'selected' 클래스 추가, popular1 버튼의 'selected' 클래스 제거
        lastest1Button.classList.add('selected');
        popular1Button.classList.remove('selected');
        
    });

    var dropbtn = document.querySelector('.dropbtn');
    // sortValue에 "sort=latest" 매개변수 값이 저장됩니다. 이 값을 출력해보세요.
    if (sortValue == "latest") {
        popularButton.style.color = '#ffffff';
        lastestButton.style.color = '#c8c8c8';
        dropbtn.value = '최근일자';
    }

    // sortValue에 "sort=latest" 매개변수 값이 저장됩니다. 이 값을 출력해보세요.
    if (sortValue == "popular") {
        popularButton.style.color = '#c8c8c8';
        lastestButton.style.color = '#ffffff';
        dropbtn.value = '인기순';
    }
});


    </script>

</head>
<body>
    <header>
        <nav class="nav-container">

            <div class="nav-toggle" id="nav_toggle">
                <i class="bi bi-list"></i>
            </div>

            <ul class="nav-list">
            <?php
            

            // 세션 변수에서 oneSongUrl 값 읽어오기
            if (isset($_SESSION["oneSongUrl"])) {
                $oneSongUrl = $_SESSION["oneSongUrl"];
                
            } else {
                // 세션 변수가 설정되지 않았을 때의 기본 URL 값
                $oneSongUrl = "OneSongADay.php";
            }

            // "하루한곡" 링크 생성
            echo '<li class="nav-item"><a href="' . $oneSongUrl . '" class="nav-link">하루한곡</a></li>';
            ?>
                <li class="nav-item"><a href="musicCategory.php" class="nav-link">음악 카테고리</a></li>
                <li class="nav-item"><a href="communityProcess1.php" class="nav-link">커뮤니티</a></li>
                <li class="nav-item"><a href="Settings.php" class="nav-link">설정</a></li>
            </ul>
            
        </nav>
    </header>

    <main class="login">

        <div class="listTitle">
                <div class="log">
                    <h1>커뮤니티</h1>
                </div><!-- log 끝 -->
                <a href="board.php"><div class="postBtn">게시하기</div></a>
                <div class="pl">
                    <div class="pl1">
                        <button class="popular" style="color: #c8c8c8;">최근일자</button>
                        <div class="l">|</div>
                        <button class="lastest">인기순</button>
                    </div><!-- pl1 끝 -->
                    <div class="pl2">
                        <div class="dropdown">
                            <input type="button" value="최근일자" class="dropbtn">
                            <ul class="dropdown-content">
                                <a class="popular1">최근일자</a>
                                <a class="lastest1">인기순</a>
                            </ul>
                        </div>
                    </div><!-- pl2 끝 -->
                </div><!-- pl 끝 -->
            </div><!-- listTitle 끝 -->

            <div class="board-lists">

            <?php
            // 데이터 출력
            if ($result->num_rows > 0) {
                // 각 행의 데이터 출력
                while($row = $result->fetch_assoc()) {
                    $imagePath = $row['image'];

                    $post_time = strtotime($row['regdate']);
                    $current_time = time();
                    $time_diff = $current_time - $post_time;
                    if ($time_diff < 60) {
                        $time_display = '방금 전';
                    } elseif ($time_diff < 3600) {
                        $minutes = floor($time_diff / 60);
                        $time_display = "$minutes 분 전";
                    } elseif ($time_diff < 86400) {
                        $hours = floor($time_diff / 3600);
                        $time_display = "$hours 시간 전";
                    } else {
                        $days = floor($time_diff / 86400);
                        $time_display = "$days 일 전";
                    }
                    echo "<div class='board-items'>";
                    echo "<a href='board_view1.php?boardID=" . $row["boardID"] . "'>";
                    echo "<div class='pro'>";
                    echo "<div class='board-item'>";
                    echo "<div class='image'><img id='profileImage' img src='userImg/basicPro.jpg'' alt='이미지' onerror='this.src='userImg/basicPro.jpg''></div>";
                    echo "</div>";
                    echo "<div class='board-hu'>";
                    echo "<div class='board-item'>";
                    echo "<div class='name1'>";
                    echo "<div class='name'>" . $row['memberID'] . "</div>"; // 사용자 이름 표시 
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='board-item'>";
                    echo "<div class='hour'>$time_display</div>";
                    echo "</div>";
                    echo "</div><!-- board-hu 끝 -->";
                    echo "</div><!-- pro 끝 -->";
                    echo "<div class='CoverandGood'>";
                    echo "<div class='name2'>";
                    echo "<div class='name'>" . $row['memberID'] . "</div>"; // 사용자 이름 표시 
                    echo "</div>";
                    echo "<div class='ttext'>" . $row["title"] . "</div>";
                    echo "<div class='SongCover'>";
                    echo "<img src='$imagePath' alt='게시물 이미지'>";
                    echo "</div>";
                    echo "<div class='Good'>";
                    echo "<i class='bi bi-hand-thumbs-up-fill'></i>";
                    echo "<div class='goodCount item3Count'>".$row['likes']."</div>";
                    echo "</div><!-- Good 끝 -->";
                    echo "</div><!-- CoverandGood 끝 -->";
                    echo "</a>";
                    echo "</div><!-- board-items 끝 -->";
                }
            } else {
                echo "<p>작성한 게시물이 없습니다.</p>";
            }

            // 연결이 열려있는 경우에만 닫기
            if ($conn->connect_error) {
                $conn->close();
            }
            ?>

        </div> <!--boardlist -->

    <div class="page">
        <?php
        include 'get_pagination.php';
        ?>
    </div><!-- page 끝 -->

    <script src="communityProcess1.js" defer></script>
    <script src="js/nav.js"></script>
</body>
</html>