// DOM이 로드된 후에 실행되는 JavaScript 코드
document.addEventListener('DOMContentLoaded', function() {
    // 페이지 번호의 클래스명이 'page-number'인 요소들을 가져와서 색상을 변경
    var pageNumbers = document.querySelectorAll('.page-number-selected');
    for (var i = 0; i < pageNumbers.length; i++) {
        pageNumbers[i].style.color = '#c8c8c8';
    }
    
    // popular 버튼
    var popularButton = document.querySelector('.popular');
    popularButton.addEventListener('click', function() {
        // 서버에 popular 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=latest';
        // popular 버튼에 'selected' 클래스 추가, lastest 버튼의 'selected' 클래스 제거
        popularButton.classList.add('selected');
        var lastestButton = document.querySelector('.lastest');
        lastestButton.classList.remove('selected');
        
    });

    // lastest 버튼
    var lastestButton = document.querySelector('.lastest');
    lastestButton.addEventListener('click', function() {
        // 서버에 lastest 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=popular';
        // lastest 버튼에 'selected' 클래스 추가, popular 버튼의 'selected' 클래스 제거
        lastestButton.classList.add('selected');
        popularButton.classList.remove('selected');
    });

    // popular 버튼
    var popularButton = document.querySelector('.popular1');
    popularButton.addEventListener('click', function() {
        // 서버에 popular 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=latest';
        // popular 버튼에 'selected' 클래스 추가, lastest 버튼의 'selected' 클래스 제거
        popularButton.classList.add('selected');
        var lastestButton = document.querySelector('.lastest');
        lastestButton.classList.remove('selected');
        dropbtn.textContent = '인기순';
    });

    // lastest 버튼
    var lastestButton = document.querySelector('.lastest1');
    lastestButton.addEventListener('click', function() {
        // 서버에 lastest 정렬 기준을 전달하고 페이지 다시 로드
        window.location.href = 'communityProcess1.php?sort=popular';
        // lastest 버튼에 'selected' 클래스 추가, popular 버튼의 'selected' 클래스 제거
        lastestButton.classList.add('selected');
        popularButton.classList.remove('selected');
        dropbtn.textContent = '인기순';
    });
});
