// 파일 업로드 엘리먼트와 아이콘 엘리먼트 가져오기
const fileInput = document.getElementById('fileInput');
const eyedropperIcon = document.querySelector('.bi-eyedropper');
const userProfileImage = document.getElementById('profileImage');

// 아이콘 클릭 시 파일 업로드 엘리먼트 클릭 이벤트 발생
eyedropperIcon.addEventListener('click', () => {
    fileInput.click();
});




// today-song
let storedTitle = sessionStorage.getItem("title");

// 가져온 title 값을 사용하여 원하는 작업 수행
console.log(storedTitle);

const itemDiv = document.querySelector(".itme.tS");
itemDiv.innerHTML = storedTitle;

// 로그아웃 기능
const logoutBtn = document.querySelector('.signoutNext');

logoutBtn.addEventListener('click', function(){
    const logout = confirm('로그아웃 하시겠습니까?');

    if(logout == true) {
        window.location.href = 'logout.php';
    } 
});
