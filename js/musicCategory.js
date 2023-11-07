const songItems = document.getElementsByClassName("CategoryCover");
let i = 0
for (let songItem of songItems) {
    const songItemImg = songItem.getElementsByTagName("img")[0];    //.book-item 하나씩 꺼내어 img 태그 가져오자
    songItemImg.src = albums[i].img;    //data.js 에서 img 값 가져와서 img 태그에 적용하자
    i++;
}

const titleItems = document.getElementsByClassName("CategoryTitle");
i = 0;  //다시 초기화
for (let titleItem of titleItems) {
    const titleItemSpan = titleItem.getElementsByTagName("span")[0];
    titleItemSpan.textContent = albums[i].title; // data.js에서 제목을 가져와서 span 요소의 텍스트로 설정
    i++;
}
