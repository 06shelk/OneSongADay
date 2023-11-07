<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루 한 곡</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/musicCategory.css">
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


    <main class="musicCategory">
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