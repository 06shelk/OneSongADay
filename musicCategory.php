<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php

include 'db_connection.php';
// 세션 시작
session_start();

// 세션 변수가 설정되어 있지 않은 경우 로그인 페이지로 리디렉션
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onedayasong</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/musicCategory.css">
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

    <main id="musicCategory">

        <div class="title-container">
            <div class="MusicCategory">
                <h1>음악 카테고리</h1>
            </div>
        </div>

        
        <div class="columns-container">
            <div class="division-container"> <!--구분하기-->
                <div class="variousGenre"><h2>다양한 가수</h2></div>
            </div>
            <div class="column-container">
                <div class="items-container">
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=1">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=2">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=3">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=4">
                            <img src="" alt="">
                        </a>
                    </div>
                </div>
                <div class="items-container">
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                </div>
            </div>
        </div>

        <div class="columns-container">
            <div class="division-container">
                <div class="musicByDate"><h2>연대 별 음악</h2></div>
            </div>
            <div class="column-container">
                <div class="items-container">
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=5">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=6">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=7">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=8">
                            <img src="" alt="">
                        </a>
                    </div>
                </div>
                <div class="items-container">
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                </div>
            </div>
        </div>
        
        <div class="columns-container">
            <div class="division-container">    
                <div class="NewArtist"><h2>새로운 아티스트</h2></div>
            </div>
            <div class="column-container">
                <div class="items-container">
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=9">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=10">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=11">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="CategoryCover">
                        <a href="ArtistInformation.php?album=12">
                            <img src="" alt="">
                        </a>
                    </div>
                </div>
                <div class="items-container">
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                    <div class="CategoryTitle"><span></span></div>
                </div>
            </div>
        </div>

    </main>
    <script src="js/nav.js"></script>
    <script src="js/test.js"></script>
    <script src="js/musicCategory.js"></script>
</body>
</html>