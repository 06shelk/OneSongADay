<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/reset.css" type='text/css'>
    <link rel=stylesheet href='css/login.css' type='text/css'>
    <link rel=stylesheet href='css/nav.css' type='text/css'>
</head>

<body>    
    <main class="login">
        <div class="log">
            <h1>로그인</h1>
        </div>
        
        <form action="loginProcess.php" method="POST" id="signin-form"> 
            <div class="login-list">
                <div class="login-items">       
                    <input name="email" type="text" class="form-control" id="email" placeholder="아이디">
                </div>
                <div class="login-items">
                    <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호">
                </div>
                <button type="submit" id="signin-button" class="btn btn-primary mb-3">로그인</button>
                <div class="signInLink">
                    <a href="signup.php">회원가입 하러 가기</a>
                </div><!-- signInLink 끝 -->
            </div><!-- login-list 끝 -->
        </form><!-- signin-form 끝 -->
    </main>
    
    <script src="js/nav.js"></script>
</body>
</html>