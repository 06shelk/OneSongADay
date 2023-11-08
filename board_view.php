<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
$conn = mysqli_connect("localhost", "root", "mysqlP@ssword", "regist");

// 게시물의 boardID를 GET 매개변수로 받음
if(isset($_GET['boardID'])) {
    $boardID = (int)$_GET['boardID'];

    // 해당 boardID의 게시물을 데이터베이스에서 가져옴
    $sql = "SELECT * FROM tb_board WHERE boardID = $boardID";
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
</head>
<body>
    <header>
        <nav class="nav-container">

            <div class="nav-toggle" id="nav_toggle">
                <i class="bi bi-list"></i>
            </div>

            <ul class="nav-list">
                <li class="nav-item"><a href="OneSongADay.php" class="nav-link">하루한곡</a></li>
                <li class="nav-item"><a href="musicCategory.php" class="nav-link">음악 카테고리</a></li>
                <li class="nav-item"><a href="communityProcess1.php" class="nav-link">커뮤니티</a></li>
                <li class="nav-item"><a href="Settings.php" class="nav-link">설정</a></li>
            </ul>
            
        </nav>
    </header>

    

    <main class="board">
        <div class="cancel">
                <a href="communityProcess1.php"><i class="bi bi-x"></i></a>
        </div>

        <div class="board-lists">

    <?php
        // 좋아요 버튼이 눌렸을 때의 처리
        if(isset($_POST['like'])) {
            $sqlUpdate = "UPDATE tb_board SET likes = likes + 1 WHERE boardID = $boardID";
            $conn->query($sqlUpdate);
        }

        if ($result->num_rows > 0) {
            // 게시물 정보 출력
            $row = $result->fetch_assoc();
            echo "<div class='board-item'>";
                echo "<div class='pro'>";
                    echo "<div class='board-items'>";
                        echo "<div class='image'></div>"; // 이미지 표시
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
                        echo "<i class='bi bi-plus-circle'></i>";
                    echo "</div>";

                    echo "<div class= 'Good'>";
                        echo "<div class= 'bi bi-hand-thumbs-up-fill likeButton'>";
                            echo "<span class= 'goodCount'>" . $row['likes'] . "</span>";
                        echo "</div>";
                    echo "</div>";

                echo "</div>";// CGood
                    
                    
            echo "</div>";// board-item
        } else {
            echo "해당 게시물을 찾을 수 없습니다.";
        }
    } else {
        echo "잘못된 요청입니다.";
    }

    ?>
        </div><!-- board-lists -->
        
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".likeButton").click(function() {
            var boardID = <?php echo $boardID; ?>;

            $.ajax({
                type: "POST",
                url: "like.php",
                data: { boardID: boardID },
                success: function(response) {
                    // 서버에서 좋아요 수를 반환하면 화면에 업데이트합니다.
                    $(".goodCount").text(response);

                }
            });
        });
    });
    </script>
    <script src="js/nav.js"></script>
    <script src="js/board_view1.js"></script>
</body>
</html>


<?php
// 연결 종료
$conn->close();
?>
