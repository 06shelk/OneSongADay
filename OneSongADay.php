<?php

include 'OneSongADayProcess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/onesongaday.css">

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
    <body>
    <main class="onesongaday">
        <div class="columns-container">
            <div class="Onesongaday">
                하루한곡
            </div>
        </div>
        
        <div class="container-wrapper">
            <div class="row-container">
                <div class="todaysong-item">
                    <div class="osodtoday">Today’s Song</div>
                    <div class="osodCover">
                        <img src="" alt="">
                    </div>
                    <div class="osodSongTitle">아지랑이</div>
                    <div class="osodSinger">루시</div>

                    <div class="todaysong-setting">
                        <div class="osodLeft"><i class="bi bi-eject-fill"></i></div>
                        <div class="osodToggle"><i class="bi bi-play-fill"></i></div>
                        <div class="osodRight"><i class="bi bi-eject-fill"></i></div>
                    </div>
                    
                    <audio src="" id="audioPlayer"></audio>
                    
                </div>
                <div class="border"></div>
            </div>

            <div class="row-container play">
                <div class="list-item">
                    <div class="playlist">playlist</i></div>
                        <ol class="playlist-item">
                        </ol>
                </div>
            </div>
        </div>
    </main>

</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/nav.js"></script>
<script src="js/test.js"></script>
<script src="js/onesongaday.js"></script>
</body>
</html>
