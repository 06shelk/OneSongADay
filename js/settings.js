const fileInput = document.getElementById('fileInput');
const eyedropperIcon = document.querySelector('.bi-eyedropper');

// 세션에서 이미지 경로 가져오기
const storedProfileImage = "<?php echo isset($_SESSION['userProfileImage']) ? $_SESSION['userProfileImage'] : ''; ?>";

// 프로필 이미지 표시
const userProfileImage = document.querySelector('.userProfile img');

if (storedProfileImage) {
    userProfileImage.src = storedProfileImage;
    console.log('세션에 저장된 이미지 경로:', storedProfileImage);
} else {
    console.log('세션에 저장된 이미지가 없습니다.');
}

// 아이콘 클릭 시 파일 업로드 엘리먼트 클릭 이벤트 발생
eyedropperIcon.addEventListener('click', () => {
    fileInput.click();
});



// 파일이 선택되면 파일 업로드 이벤트 처리
fileInput.addEventListener('change', () => {
    const selectedFile = fileInput.files[0];

    // 예시: 선택한 이미지를 화면에 표시
    if (selectedFile) {
        // 파일 이름을 인코딩
        const encodedFileName = encodeURIComponent(selectedFile.name);
        userProfileImage.src = URL.createObjectURL(selectedFile);

        // 이미지 주소를 서버로 전송할 수 있음
        const formData = new FormData();
        formData.append('imageFile', selectedFile);
        formData.append('encodedFileName', encodedFileName);

        // 서버로 이미지 주소 전송 (아래에서 설명)
        fetch('settingsProcess.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // 서버에서 반환한 JSON 데이터 처리 (필요에 따라)
        .then(data => {
            console.log(data); // 서버에서 반환한 응답을 로그로 출력 (필요에 따라)
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});



// 로그아웃 기능
const logoutBtn = document.querySelector('.signoutNext');

logoutBtn.addEventListener('click', function(){
    const logout = confirm('로그아웃 하시겠습니까?');

    if(logout == true) {
        window.location.href = 'logout.php';
    } 
});
