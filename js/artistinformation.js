let url = new URL(location.href);
let artist = url.searchParams.get("album");
console.log(`artist: ${artist} type: ${typeof artist}`);      //"3" string
//artist null이면 index 가자
if (artist === null) {
    location.href = "index.php";
}

let artistId = parseInt(artist);    //string -> number
console.log(`artistId: ${artistId} type: ${typeof artistId}`);

let artistData;
for (let artistOne of albums) {
    if (artistId === artistOne.id) {    //===: 값이랑 자료형이랑 둘다 맞을 때 ㅇㅈ
        artistData = artistOne;
        break;
    }
}

let title = artistData.title;
// console.log(bookData["title"]);
let singer = artistData.singer;
let agency = artistData.agency;
let debut = artistData.debut;
let activity = artistData.activity;
let artistImage = artistData.img;
let music = artistData.music;
console.log(title, singer, agency, artistImage, debut, activity, music);

const artistImageDiv = document.getElementsByClassName("userProfile")[0];
artistImageDiv.innerHTML = `<img src="${artistImage}" />`;

//HTML 요소 -> js 변수
const titleDiv = document.getElementsByClassName("title")[0];
// const titleDiv = document.querySelectorAll(".title");
//js 변수.innerHTML
//titleDiv 에 title 속성에 값으로 변수 title을 넣자
// titleDiv.setAttribute("title", title);
titleDiv.innerHTML = title;
//titleDiv 에 title 속성에 값으로 변수 title을 넣자
// titleDiv.setAttribute("title", title);
titleDiv.title = title;

const singerrDiv = document.getElementsByClassName("singer")[0];
singerrDiv.innerHTML = singer;

const agencyDiv = document.getElementsByClassName("agency")[0];
agencyDiv.innerHTML = agency;

const debutDiv = document.getElementsByClassName("debut")[0];
debutDiv.innerHTML = debut;

const activityDiv = document.getElementsByClassName("activity")[0];
activityDiv.innerHTML = activity;
