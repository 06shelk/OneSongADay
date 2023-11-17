<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/board.css">
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