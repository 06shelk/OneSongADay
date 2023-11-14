<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php 
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// 기존 이미지 경로 확인
$uploaded_image_path = isset($_SESSION['uploaded_image']) ? $_SESSION['uploaded_image'] : '';


/*********************************************
* 넘어오는 데이터가 정상인지 검사하기 위한 절차
* 실제 페이지에서는 적용 X
**********************************************/

/*********************************************
* 실제로 구축되는 페이지 내부.
**********************************************/

// 임시로 저장된 정보(tmp_name)
$tempFile = $_FILES['imgFile']['tmp_name'];

// 파일타입 및 확장자 체크
$fileTypeExt = explode("/", $_FILES['imgFile']['type']);

// 파일 타입 
$fileType = $fileTypeExt[0];

// 파일 확장자
$fileExt = $fileTypeExt[1];

// 확장자 검사
$extStatus = false;

switch($fileExt){
    case 'jpeg':
    case 'jpg':
    case 'gif':
    case 'bmp':
    case 'png':
        $extStatus = true;
        break;

    default:
        ?>
        <script>
            alert("이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다.");
        </script>
        <?php
        exit;
        break;
}

// 이미지 파일이 맞는지 검사. 
if($fileType == 'image'){
    // 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외에는 업로드 불가
    if($extStatus){
        // 임시 파일 옮길 디렉토리 및 파일명
        $resFile = "userImg/{$_FILES['imgFile']['name']}";
        // 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
        $imageUpload = move_uploaded_file($tempFile, $resFile);
        
        // 업로드 성공 여부 확인
        if ($imageUpload == true) {
            echo "<img src='{$resFile}' width='100' />";
            $_SESSION['uploaded_image'] = $resFile;
        } else {
            ?>
        <script>
            alert("파일 업로드에 실패하였습니다.");
        </script>
        <?php
        }
    }	// end if - extStatus
    // 확장자가 jpg, bmp, gif, png가 아닌 경우 else문 실행
    else {
        ?>
        <script>
            alert("파일 확장자는 jpg, bmp, gif, png 이어야 합니다.");
        </script>
        <?php
        exit;
    }	
}	// end if - filetype
// 파일 타입이 image가 아닌 경우 
else {
    ?>
        <script>
            alert("이미지 파일이 아닙니다.");
        </script>
    <?php
    exit;
}

?>

<?php

// 사용자가 로그인한 경우에만 이미지를 표시하도록 조건을 추가합니다.
if (isset($_SESSION['user_id'])) {
    // 사용자 ID를 세션에서 가져옵니다.
    $userId = $_SESSION['user_id'];


	

    // 데이터베이스 연결 설정 코드를 추가합니다.
    include 'db_connection.php';

    // 사용자 테이블에서 userimage 컬럼을 선택합니다.
    $selectQuery = "SELECT userimage FROM tb_user WHERE userid = $userId";

    // 쿼리 실행
    $result = mysqli_query($conn, $selectQuery);

    if ($result) {
        // 쿼리 결과에서 이미지 경로를 가져옵니다.
        $row = mysqli_fetch_assoc($result);
        $userImage = $row['userimage'];

        // 이미지가 존재하는 경우에만 이미지를 표시합니다.
        if (!empty($userImage)) {
            echo "<img src='$userImage' width='100' alt='User Image'>";
        } else {
            // 사용자가 이미지를 업로드하지 않은 경우 기본 이미지를 표시합니다.
           
        }
    } else {
		?>
        <script>
            alert("이미지 파일이 아닙니다.");
        </script>
    <?php
        echo "데이터베이스 쿼리 실패: " . mysqli_error($conn);
    }

    // 데이터베이스 연결을 닫습니다.
    mysqli_close($conn);
} else {
    // 사용자가 로그인하지 않은 경우 기본 이미지를 표시합니다.
    echo "<img src='userImg/basicPro.jpg' width='100' alt='Default Image'>";
}
?>

