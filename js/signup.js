const signupForm = document.querySelector("#signup-form");
const signupButton = document.querySelector("#signup-button");
const password = document.querySelector("#password");
const passwordCheck = document.querySelector("#password-check");
const name = document.querySelector("#name");

signupButton.addEventListener("click", function(e) {
    if(password.value === passwordCheck.value){
        signupForm.submit();
    }else{
        alert("비밀번호가 서로 일치하지 않습니다");
    }
});