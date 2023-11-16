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
    <link rel="stylesheet" href="css/settings.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

    <main id="review">

        <div class="title-container">
            <div class="MusicCategory">
                <h1>설정</h1>
            </div>
        </div>

        <div class="image-info-groups container">
            <div class="profilecontainer">
            <div class="userPhoto">계정 사진 <i class="bi bi-eyedropper"></i></div>
                <!-- form 요소에 id를 추가합니다. -->
            <form id="fileUploadForm" enctype="multipart/form-data">
                <input type="file" name="imgFile" id="fileInput" style="display: none;">
                <input type="button" value="업로드" onclick="uploadFile()" class="svaubmit" style="display: none;"/>
            </form>

            <!-- 이미지를 표시할 곳을 마련합니다. -->
            <div id="uploadedImageContainer">
                <?php
                    // 세션에 저장된 이미지 경로를 확인
                    $userImage = isset($_SESSION['userImage']) ? $_SESSION['userImage'] : '';


                    // 이미지가 존재하는 경우에만 이미지를 표시합니다.
                    if (!empty($userImage)) {
                        // 이미지 URL에 랜덤 파라미터를 추가하여 이미지를 강제로 새로고침합니다.
                        $timestamp = time();
                        echo "<img src='$userImage?$timestamp' width='100' alt='User Image'>";
                    } else {
                        // 사용자가 이미지를 업로드하지 않은 경우에는 기본 이미지를 표시합니다.
                        echo "<img src='userImg/basicPro.jpg' width='100' alt='Default Image'>";
                    }
                ?>
            </div>
           


            <script>
            function uploadFile() {
                // FormData 객체를 생성합니다.
                const submitBtn = document.querySelector('.svaubmit');
                var formData = new FormData(document.getElementById('fileUploadForm'));
                submitBtn.style.display = 'none';
                // AJAX를 사용하여 파일을 업로드합니다.
                $.ajax({
                    type: 'POST',
                    url: 'fileUploadResult.php',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // 업로드된 이미지를 표시합니다.
                        $('#uploadedImageContainer').html(response);
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }
            </script>




            </div>

            <div class="info-groups container">
                <div class="info-group container">
                    <div class="info container">
                        <div class="items">
                            <?php echo $_SESSION['username']; ?>
                        </div>
                        <div class="itme">
                            <span class="pwchange"><a href="changePW.php">비밀번호 ></a></span>
                        </div>
                    </div>
                    <div class="info container">
                        <div class="itmes">
                            Today's Song
                        </div>
                        <div class="itme tS">
                           
                        </div>
                    </div><!-- info container -->
                </div><!-- info-group container -->
            </div><!-- info-groups container -->
        </div>

        

        <div class="userComs">
        </div>

        <div class="userCom container">
            <div class="userCommunity">
                당신의 커뮤니티 글
            </div>
            <div class="userCommunityNext">
                <a href="myCommunity.php">></a>
            </div>
        </div>
        <div class="userCom container">
            <div class="signout">
                로그아웃
            </div>
            <div class="signoutNext">
                >
            </div>
        </div>



    <script src="js/data.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/settings.js"></script>
</body>
</html>