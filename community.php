<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name111="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/community.css">
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

    <main class="login">
        
        <div class="listTitle">
            <div class="log">
                <h1>커뮤니티</h1>
            </div><!-- log 끝 -->
            <div class="pl">
                <div class="pl1">
                    <button class="popular">최근일자</button>
                    <div class="l">|</div>
                    <button class="lastest">인기순</button>
                </div><!-- pl1 끝 -->
                <select class="pl2">
                    <option value="1">최근일자</option>
                    <option value="2">인기순</option>
                </select><!-- pl2 끝 -->
            </div><!-- pl 끝 -->
        </div><!-- listTitle 끝 -->

        <div class="board-lists">
           
        </div><!-- board-lists 끝-->


        <div class="page">
            
        </div><!-- page 끝-->
    </main>
    <script src="js/community.js"></script>
    <script src="js/nav.js"></script>
</body>
</html>