// 파일 업로드 엘리먼트와 아이콘 엘리먼트 가져오기
const fileInput = document.getElementById('fileInput');
const eyedropperIcon = document.querySelector('.bi-plus-circle');
const songCoverImage = document.querySelector('.songCover img'); // Get the image element

// 아이콘 클릭 시 파일 업로드 엘리먼트 클릭 이벤트 발생
eyedropperIcon.addEventListener('click', () => {
    fileInput.click();
});

// 파일이 선택되면 파일 업로드 이벤트 처리
fileInput.addEventListener('change', () => {
    // 선택한 파일 처리를 원하는 방식으로 진행하세요.
    const selectedFile = fileInput.files[0];

    // 예시: 선택한 이미지를 화면에 표시
    if (selectedFile) {
        songCoverImage.src = URL.createObjectURL(selectedFile); // Update the image source
    }
});

// 이미지를 추가했을 때 아이콘을 숨김
fileInput.addEventListener('change', function () {
    eyedropperIcon.style.display = 'none';
});
