// 파일 업로드 엘리먼트와 아이콘 엘리먼트 가져오기
const fileInput = document.getElementById('fileInput');
const eyedropperIcon = document.querySelector('.bi-eyedropper');

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
        const userProfileImage = document.querySelector('.userProfile img');
        userProfileImage.src = URL.createObjectURL(selectedFile);
        console.log(userProfileImage);
    }
});



// today-song
let storedTitle = sessionStorage.getItem("title");

// 가져온 title 값을 사용하여 원하는 작업 수행
console.log(storedTitle);

const itemDiv = document.querySelector(".itme.tS");
itemDiv.innerHTML = storedTitle


// 로그아웃 기능
const logoutBtn = document.querySelector('.signoutNext');

logoutBtn.addEventListener('click', function(){
    const logout = confirm('로그아웃 하시겠습니까?');

    if(logout == true) {
        window.location.href = 'logout.php';
    } 
});


