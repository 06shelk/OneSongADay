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


