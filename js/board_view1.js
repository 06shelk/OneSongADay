document.addEventListener("DOMContentLoaded", function() {
    const likeButtons = document.querySelectorAll(".likeButton");

    likeButtons.forEach(function(likeButton) {
        likeButton.addEventListener("click", function() {
            const postId = this.getAttribute("data-post-id");

            // 서버로 요청을 보내고, 성공적으로 처리되면 좋아요 상태를 업데이트합니다.
            fetch('like.php', {
                method: 'POST',
                body: JSON.stringify({ postId: postId }),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'liked') {
                    // 좋아요를 누른 경우
                    this.classList.add('liked'); // 좋아요 스타일을 변경할 클래스를 추가
                    this.querySelector('.goodCount').textContent = data.likes; // 좋아요 개수 업데이트
                } else if (data.status === 'unliked') {
                    // 좋아요를 취소한 경우
                    this.classList.remove('liked'); // 좋아요 스타일을 변경할 클래스를 제거
                    this.querySelector('.goodCount').textContent = data.likes; // 좋아요 개수 업데이트
                }
            });
        });
    });
});