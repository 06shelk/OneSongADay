<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/board.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
        <button class="cancel">
            <a href="communityProcess1.php"><i class="bi bi-x"></i></a>
        </button>
    
        <form name="boardWrite" method="POST" action="boardProcess.php" enctype="multipart/form-data">
            <div class="subButton">
                
                <input type="submit" class="board-button post1"  value="게시하기" />
            </div>

            <main class="musicCategory">
                <div class="board-lists">
                    <div class="pro">
                        <div class="board-items">
                        <div class="image" style="background-image: url('<?php echo $_SESSION['userimage']; ?>'); background-size: cover;"></div>
                        </div>
                        <div class="board-items">
                        <div class="name"><?php echo $_SESSION['username']; ?></div>
                        </div>
                    </div>
                    <div class="cont">
                        <div class="board-items">
                            <input type="text" id="boardTitle" name="boardTitle" required placeholder="노래 제목"/>
                            <textarea name="boardCont" id="boardCont" cols="70" rows="3" required  placeholder="곡을 추천하고 싶은 이유를 적어주세요."></textarea>
                        </div>
                        <i class="bi bi-plus-circle"></i>
                        <div class="CGood">
                            <div class="songCover">
                                
                                <img src="" alt="" />
                                <!-- <img src="/images/icon.png" alt="이미지" onerror="this.src='images/icon.png'" /> -->
                                <input type="file" id="fileInput" name="fileInput" style="display: none;">
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </main>
        </form>
    <script src="js/nav.js"></script>
    <script src="js/board.js"></script>
</body>
</html>