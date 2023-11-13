<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
// db_connection.php 파일을 불러와서 연결 설정
include 'db_connection.php';

session_start(); // 세션 시작

$userid = $_POST['email'];
$password = $_POST['password'];

// 입력값이 비어있는지 확인
if (empty($userid) || empty($password)) {
    ?>
    <script>
        alert("값을 입력해주세요");
        location.href = "login.php";
    </script>
    <?php
    exit; // 입력값이 없으면 스크립트를 실행한 후 코드 실행 종료
}

// DB 정보 가져오기
$useridQuery = "SELECT * FROM tb_user WHERE userid ='{$userid}' AND userpw ='{$password}'";
$result = $conn->query($useridQuery);

if ($result && $result->num_rows > 0) {
    // 인증 성공 - 사용자가 존재하는 경우
    $userRow = $result->fetch_assoc();
    $username = $userRow['username']; // 해당 사용자의 username 값을 가져옴

    $_SESSION['user_id'] = $userid; // 사용자 ID를 세션 변수에 저장
    $_SESSION['username'] = $username; // username을 세션 변수에 저장

    // 사용자가 이미 들은 노래 목록을 세션에서 가져오기
    $loadedSongs = isset($_SESSION['loaded_songs']) ? $_SESSION['loaded_songs'] : array();

    do {
        // 중복이 없을 때까지 랜덤한 ID 생성
        $randomId = mt_rand(1, 12);
    } while (in_array($randomId, $loadedSongs));

    // 추천한 노래를 세션에 추가
    $loadedSongs[] = $randomId;
    $_SESSION['loaded_songs'] = $loadedSongs;

    ?>
    <script>
        alert("로그인 완료되었습니다");
        // PHP에서 생성한 $randomId를 JavaScript로 전달
        var randomId = <?php echo $randomId; ?>;
        window.location.href = "onesongaday.php?id=" + randomId;
    </script>
    <?php
} else {
    // 인증 실패 - 사용자가 존재하지 않거나 비밀번호가 틀린 경우
    ?>
    <script>
        alert("아이디 또는 비밀번호가 올바르지 않습니다.");
        location.href = "login.php";
    </script>
    <?php
}
?>
