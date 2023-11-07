<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="css/reset.css" type='text/css'>
    <link rel=stylesheet href='css/nav.css' type='text/css'>
    <link rel=stylesheet href='css/login.css' type='text/css'>
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
            <div class="log">
                <h1>비밀번호 변경</h1>
            </div>
        <form action="changePWProcess.php" method="post" onsubmit="return validateForm()">
            <div class="login-list">
                <div class="login-items">   
                    <input id="email" name="email" placeholder="아이디" required><br>
                </div>
                <div class="login-items">
                    <input type="password" id="current_password"placeholder="기존 비밀번호" name="current_password" required><br>
                </div>
                <div class="login-items">
                    <input type="password" id="new_password"placeholder="새로운 비밀번호"  name="new_password" required><br>
                </div>
                <button type="submit">비밀번호 변경</button>
            </div>
        </form>
    </main>


    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var currentPassword = document.getElementById("current_password").value;
            var newPassword = document.getElementById("new_password").value;

            if(email === "" || currentPassword === "" || newPassword === "") {
                alert("값을 입력해주세요.");
                return false; // 폼 제출을 중지합니다.
            }

            return true; // 유효한 경우 폼이 제출됩니다.
        }
    </script>
    <script src="js/nav.js"></script>
</body>
</html>