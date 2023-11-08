let url = new URL(location.href);
let id = url.searchParams.get("id");
console.log(`id: ${id} type: ${typeof id}`);      //"3" string

let idId = parseInt(id);    //string -> number
console.log(`idId: ${idId} type: ${typeof idId}`);

let idData;
for (let idOne of albums) {
    if (idId === idOne.id) {    //===: 값이랑 자료형이랑 둘다 맞을 때 ㅇㅈ
        idData = idOne;
        break;
    }
}

// test.js에서 가져온 값 확인하기
let title = idData.title;
let singer = idData.singer;
let artistImage = idData.img;
let music = idData.music;
console.log(title, singer, artistImage, music);

// 세션 스토리지에 title 값을 저장
sessionStorage.setItem("title", title);

const idImageDiv = document.getElementsByClassName("osodCover")[0];
idImageDiv.innerHTML = `<img src="${artistImage}" />`;

// HTML 요소 -> js 변수
const titleDiv = document.getElementsByClassName("osodSongTitle")[0];
titleDiv.innerHTML = title;

const singerDiv = document.getElementsByClassName("osodSinger")[0];
singerDiv.innerHTML = singer;


// 로그인된 사용자의 정보
let userId = "<?php echo $_SESSION['user_id']; ?>";

// Ajax 요청 보내기
$.ajax({
    type: "POST",
    url: "insert_song.php", // 데이터를 처리할 PHP 파일 경로를 지정합니다.
    data: {
        title: title,
        singer: singer,
        artistImage: artistImage,
        music: music,
        userId: userId // 사용자 ID를 함께 보냅니다.
    },
    success: function(response) {
        console.log(response); // 서버 응답을 콘솔에 출력합니다.
    },
    error: function(error) {
        console.error(error); // 오류가 발생한 경우 콘솔에 에러 메시지를 출력합니다.
    }
});

function getUserSongs(userId) {
    // AJAX 요청을 사용하여 노래 제목 가져오기
    $.ajax({
        type: "GET",
        url: "get_user_songs.php",
        data: {
            userId: userId
        },
        dataType: "json",
        success: function(response) {
            const songTitles = response;
            const listSongTitle = document.getElementById("listSongTitle");
            listSongTitle.innerHTML = ''; // 기존 리스트를 비우고 새로운 데이터로 채웁니다.

            // 가져온 노래 제목을 리스트에 추가
            songTitles.forEach(function(title) {
                const listItem = document.createElement("li");
                listItem.textContent = title;
                listSongTitle.appendChild(listItem);
            });
        },
        error: function(error) {
            console.error(error);
        }
    });
}



//오디오 값 가지기
audioPlayer.src = music;

// 오디오 상태를 나타내는 변수를 설정합니다.
let isPlaying = false;


const osodToggle = document.querySelector(".osodToggle");
osodToggle.addEventListener("click", () => {
    if (isPlaying) {
        // 오디오가 재생 중인 경우, 일시 정지하고 아이콘을 변경합니다.
        audioPlayer.pause();
        osodToggle.innerHTML = '<i class="bi bi-play-fill"></i>';
    } else {
        // 오디오가 일시 정지 중인 경우, 재생하고 아이콘을 변경합니다.
        audioPlayer.play();
        osodToggle.innerHTML = '<i class="bi bi-pause-fill"></i>';
    }
    // 재생 상태를 토글합니다.
    isPlaying = !isPlaying;
});

// 10초 전으로 이동하는 함수
function rewind() {
    audioPlayer.currentTime -= 10;
}

// 10초 후로 이동하는 함수
function fastForward() {
    audioPlayer.currentTime += 10;
}

// osodLeft을 클릭하는 이벤트 리스너를 추가합니다.
const osodLeft = document.querySelector(".osodLeft");
osodLeft.addEventListener("click", rewind);

// osodRight을 클릭하는 이벤트 리스너를 추가합니다.
const osodRight = document.querySelector(".osodRight");
osodRight.addEventListener("click", fastForward);
$(document).ready(function() {
    // 기존 노래 목록을 초기화
    const listSongTitle = document.querySelector(".playlist-item");
    listSongTitle.innerHTML = '';

    // AJAX 요청을 사용하여 노래 제목 가져오기
    $.ajax({
        type: "GET",
        url: "get_user_songs.php", // 노래 제목을 가져오는 PHP 파일 경로를 지정합니다.
        dataType: "json", // 응답을 JSON 형식으로 기대함을 명시합니다.
        success: function(response) {
            const songTitles = response;
            const existingSongsCount = listSongTitle.children.length;

            // 가져온 노래 제목을 리스트에 추가
            songTitles.forEach(function(title, index) {
                if (index >= existingSongsCount && index < existingSongsCount + 4) {
                    const listItem = document.createElement("li");
                    listItem.textContent = title;
                    listItem.classList.add("listSongTitle"); // 클래스 추가
                    listSongTitle.appendChild(listItem);
                    listSongTitle.style.cursor = "pointer";
                }
            });
        },
        error: function(error) {
            console.error(error);
        }
    });

    listSongTitle.addEventListener("click", function(event) {
        if (event.target.classList.contains("listSongTitle")) {
            // 클릭된 요소가 listSongTitle 클래스를 가지고 있는 경우에만 처리를 수행합니다.
            const clickedItem = event.target;
            const selectedTitle = clickedItem.textContent;
    
            // albums 배열에서 선택된 노래 정보를 찾기
            const selectedSong = albums.find(song => song.title === selectedTitle);
    
            // 선택된 노래 정보로 변수들 업데이트
            if (selectedSong) {
                title = selectedSong.title;
                singer = selectedSong.singer;
                artistImage = selectedSong.img;
                music = selectedSong.music;
    
                // 업데이트된 값으로 UI 업데이트
                idImageDiv.innerHTML = `<img src="${artistImage}" />`;
                titleDiv.innerHTML = title;
                singerDiv.innerHTML = singer;
                audioPlayer.src = music;
            } else {
                console.error("선택된 노래를 찾을 수 없습니다.");
            }
        }
    });
    

});
