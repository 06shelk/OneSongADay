<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>하루한곡</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/reset.css" type='text/css'>
    <link rel=stylesheet href='css/nav.css' type='text/css'>
    <link rel=stylesheet href='css/login.css' type='text/css'>
</head>

<body>
    <main class="login">
        <div class="log">
            <h1>회원가입</h1>
        </div>

        <form action="signupProcess.php" method="POST" id="signup-form">
            <div class="login-list">
                <div class="login-items">
                    <input class="form-control" name="id" type="id" placeholder="아이디">
                </div>
                <div class="login-items">
                    <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호">
                </div>
                <div class="login-items">
                    <input type="password" class="form-control" id="password-check" placeholder="비밀번호 확인">
                </div>
                <div class="login-items">
                    <input name="name" type="name" class="form-control" id="name" placeholder="이름">
                </div>
                <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button>
            </div><!-- signup-list -->
        </form><!--signup-form-->
    </main>

    <script src="js/nav.js"></script>
    <script src="js/signup.js"></script>
</body>

</html>


