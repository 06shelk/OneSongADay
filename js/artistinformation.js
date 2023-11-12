let url = new URL(location.href);
let artist = url.searchParams.get("album");
console.log(`artist: ${artist} type: ${typeof artist}`);      //"3" string
//artist null이면 index 가자
if (artist === null) {
    location.href = "index.html";
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
let artistImage = artistData.profile;
let music = artistData.music;

let elbumImage = artistData.elbumImage;
let elbumImage1 = artistData.elbumImage1;
let elbumImage2 = artistData.elbumImage2;
let elbumImage3 = artistData.elbumImage3;

let elbumTitle = artistData.elbumTitle;
let elbumTitle1 = artistData.elbumTitle1;
let elbumTitle2 = artistData.elbumTitle2;
let elbumTitle3 = artistData.elbumTitle3;

console.log(title, singer, agency, artistImage, debut, activity, music);
console.log(elbumTitle, elbumTitle1, elbumTitle2, elbumTitle3);

const artistImageDiv = document.getElementsByClassName("userProfile")[0];
artistImageDiv.innerHTML = `<img src="${artistImage}" />`;


//아티스트 음악 4개
const elbumImageDiv = document.getElementsByClassName("CategoryCover")[0];
elbumImageDiv.innerHTML = `<img src="${elbumImage}" />`;

const elbumImage1Div = document.getElementsByClassName("CategoryCover")[1];
elbumImage1Div.innerHTML = `<img src="${elbumImage1}" />`;

const elbumImage2Div = document.getElementsByClassName("CategoryCover")[2];
elbumImage2Div.innerHTML = `<img src="${elbumImage2}" />`;

const elbumImage3Div = document.getElementsByClassName("CategoryCover")[3];
elbumImage3Div.innerHTML = `<img src="${elbumImage3}" />`;
//--------------------------------------------------------------------------

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

//아티스트 음악 타이틀
const elbumTitleDiv = document.getElementsByClassName("CategoryTitle")[0];
elbumTitleDiv.innerHTML = elbumTitle;

const elbumTitle1Div = document.getElementsByClassName("CategoryTitle")[1];
elbumTitle1Div.innerHTML = elbumTitle1;

const elbumTitle2Div = document.getElementsByClassName("CategoryTitle")[2];
elbumTitle2Div.innerHTML = elbumTitle2;

const elbumTitle3Div = document.getElementsByClassName("CategoryTitle")[3];
elbumTitle3Div.innerHTML = elbumTitle3;

//--------------------------------------------------------------------------



