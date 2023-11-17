<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
    include 'db_connection.php';

    session_start(); // 세션 시작

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userid = $_POST['email'];
        $currentPassword = $_POST['current_password']; // 기존 비밀번호
        $newPassword = $_POST['new_password']; // 새로운 비밀번호
        
        // 입력값이 비어있는지 확인
        if(empty($userid) || empty($currentPassword) || empty($newPassword)) {
            ?>
            <script>
                alert("값을 입력해주세요.");
                location.href = "settings.php"; // 폼 페이지로 리디렉션
            </script>
            <?php
            exit; // 입력값이 없으면 스크립트를 실행한 후 코드 실행 종료
        }

        // 기존 비밀번호 확인
        $useridQuery = "SELECT * FROM tb_user WHERE userid ='{$userid}' AND userpw ='{$currentPassword}'";
        $result = mysqli_query($conn, $useridQuery);
        
        if ($result && mysqli_num_rows($result) > 0) {
            // 기존 비밀번호 일치 - 비밀번호 업데이트
            $updateQuery = "UPDATE tb_user SET userpw = '{$newPassword}' WHERE userid = '{$userid}'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                ?>
                <script>
                    alert("비밀번호가 성공적으로 변경되었습니다.");
                    location.href = "settings.php"; // 변경 후 설정 페이지로 리디렉션
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("비밀번호 변경에 실패했습니다.");
                    location.href = "settings.php"; // 실패 시 폼 페이지로 리디렉션
                </script>
                <?php
            }
        } else {
            // 기존 비밀번호가 틀린 경우
            ?>
            <script>
                alert("기존 비밀번호가 올바르지 않습니다.");
                location.href = "settings.php"; // 실패 시 폼 페이지로 리디렉션
            </script>
            <?php
        }
    }
?>
