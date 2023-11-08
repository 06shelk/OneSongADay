<?php 
    include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onedayasong</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/artistInformation.css">
</head>
<body>
<header>
        <nav class="nav-container">

            <div class="nav-toggle" id="nav_toggle">
                <i class="bi bi-list"></i>
            </div>

            <ul class="nav-list">
            <?php
            session_start(); // 세션 시작

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

    <main id="review">

        <div class="title-container">
            <div class="Artist">
                <h1>아티스트 정보</h1>
            </div>
        </div>

        <div class="image-info-groups container">
            <div class="profilecontainer">
                <div class="userPhoto">
                    <div class="singer">  
                        .singer
                    </div>
                </div>
                <div class="userProfile">
                    <img src="" alt="">
                </div>
            </div>

            <div class="info-groups container">
                <div class="info-group container">
                    <div class="info container">
                        <div class="title-text">제목 :</div>
                        <div class="debut-text">데뷔일 :</div>
                    </div>
                    <div class="info container">
                        <div class="agency-text">소속사 :</div>
                        <div class="activity-text">팀구성 :</div>
                    </div>
                </div>

                <div class="info-group container">
                    <div class="info container">
                        <div class="title"></div>
                        <div class="debut"></div>
                    </div>
                    <div class="info container">
                        <div class="agency"></div>
                        <div class="activity"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="columns-container">
            <div class="division-container">
                <button div class="musicByDate"><h3>아티스트 음악</h3></div>
            </div>
        </div>
            
        <div class="column-container">
            <div class="items-container">
                <div class="CategoryCover">
                    <img src="" alt="">
                </div>
                <div class="CategoryCover">
                    <img src="" alt="">
                </div>
                <div class="CategoryCover">
                    <img src="" alt="">
                </div>
                <div class="CategoryCover">
                    <img src="" alt="">
                </div>
            </div>
            <div class="items-container">
                <div class="CategoryTitle"></div>
                <div class="CategoryTitle"></div>
                <div class="CategoryTitle"></div>
                <div class="CategoryTitle"></div>
            </div>
        </div>

    </main>
    <script src="js/test.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/artistinformation.js"></script>
    
</body>
</html>