<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
session_start();

// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';

// 세션이 존재하지 않으면 로그인 페이지로 리다이렉트
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// 현재 로그인된 사용자의 username
$username = $_SESSION['username'];

// 현재 사용자의 게시물을 가져옴
$sql = "SELECT * FROM tb_board WHERE memberID = '$username'";
$result = $conn->query($sql);
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
    <link rel="stylesheet" href="css/myCommunity.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/image/favi/favicon.ico"> <!--추가-->
    <link rel="apple-touch-icon" sizes="57x57" href="/image/favi/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/image/favi/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/image/favi/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/image/favi/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/image/favi/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/image/favi/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/image/favi/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/image/favi/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/image/favi/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/image/favi/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/image/favi/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/image/favi/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/image/favi/favicon-16x16.png">
    <link rel="manifest" href="/image/favi/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/image/favi/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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

    

    <main class="board">
        <div class="cancel">
                <a href="settings.php"><i class="bi bi-x"></i></a>
        </div>

        <div class="board-lists">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = $row['image'];
                    $username = $row['memberID'];

                    // 사용자 테이블에서 해당 사용자의 이미지를 가져옵니다.
                    $userimageQuery = "SELECT userimage FROM tb_user WHERE userid = '$username'";
                    $userimageResult = $conn->query($userimageQuery);

                    if ($userimageResult->num_rows > 0) {
                        $userimageRow = $userimageResult->fetch_assoc();
                        $userimagePath = $userimageRow['userimage'];
                    } else {
                        // 사용자 이미지가 없을 경우 기본 이미지 경로를 설정합니다.
                        $userimagePath = 'userImg/basicPro.jpg';
                    }

                    echo "<div class='board-item'>";
                        echo "<div class='pro'>";
                            echo "<div class='board-items'>";
                            echo "<div class='image' style='background-image: url(\"" . $_SESSION['userimage'] . "\"); background-size: cover;'></div>";

                            echo "</div>";
                            echo "<div class='board-items'>";
                                echo "<div class='name'>" . $row['memberID'] . "</div>"; // 사용자 이름 표시 
                            echo "</div>";
                        echo "</div>"; // pro

                        echo "<div class='cont'>";
                            echo "<div class='board-items'>";
                                echo "<div id='boardTitle'>" . $row['title'] . "</div>"; // 제목 표시 
                                echo "<div id='boardCont'>" . $row['content'] . "</div>"; // 내용 표시 
                            echo "</div>";
                        echo "</div>"; //cont
                        echo "<div class='CGood'>";
                            echo "<div class='songCover'>";
                                echo "<img src='$imagePath' alt='게시물 이미지'>";
                            echo "</div>";

                            echo "<div class= 'Good'>";
                                echo "<div class= 'bi bi-hand-thumbs-up-fill'>";
                                    echo "<span class= 'goodCount'>" . 0 . "</span>";
                                echo "</div>";
                            echo "</div>";

                        echo "</div>";// CGood
                    
                    
                    echo "</div>";// board-item
                }
            } else {
                echo "<p>작성한 게시물이 없습니다.</p>";
            }
            ?>
        </div><!-- board-lists -->
    </main>
    <script src="js/nav.js"></script>
</body>
</html>

<?php
// 연결 종료
$conn->close();
?>
