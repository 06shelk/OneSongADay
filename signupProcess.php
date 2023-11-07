<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';

if(empty($_POST['id']) || empty($_POST['password']) || empty($_POST['name'])) {
    // 값이 비어있을 때의 처리
    ?>
    <script>
        alert("값을 입력해주세요");
        location.href = "signup.php";
    </script>
    <?php
    exit;
}

// 입력한 아이디가 이미 존재하는지 확인
$check_query = "SELECT * FROM tb_user WHERE userid='{$_POST['id']}'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // 이미 존재하는 아이디일 때의 처리
    ?>
    <script>
        alert("중복된 아이디입니다.");
        location.href = "signup.php";
    </script>
    <?php
    exit;
}

// 아이디가 존재하지 않는 경우 회원가입 처리
$sql = "INSERT INTO tb_user(userid, userpw, username) VALUES('{$_POST['id']}', '{$_POST['password']}', '{$_POST['name']}')";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    // 저장에 문제가 생겼을 때의 처리
    ?>
    <script>
        alert("저장에 문제가 생겼습니다. 관리자에게 문의해주세요.");
        location.href = "signup.php";
    </script>
    <?php
    //echo mysqli_error($conn);
} else {
    // 회원가입이 성공한 경우의 처리
    session_start(); // 세션 시작
    $_SESSION['username'] = $_POST['name']; // 'name'은 회원가입 폼에서 넘어온 사용자 이름 필드의 이름
    ?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "login.php";
    </script>
    <?php
}
?>
