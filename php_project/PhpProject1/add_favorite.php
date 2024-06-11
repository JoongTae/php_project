<?php
// 공연 ID와 사용자 ID를 받아와서 데이터베이스에 저장하는 코드를 작성합니다.
$concertId = $_POST['concertId'];
$userId = $_POST['userId'];

// 여기에 데이터베이스 연결 및 쿼리 실행하는 코드를 작성합니다.
// 예시: 찜한 공연을 users 테이블에 저장하는 쿼리
// $query = "INSERT INTO user_favorite_concerts (user_id, concert_id) VALUES ('$userId', '$concertId')";
// mysqli_query($connection, $query);

// 성공 또는 실패 여부에 따라 응답을 반환합니다.
if ($query) {
    echo "success";
} else {
    echo "error";
}
?>
<!-- 찜하기 버튼 -->
<button onclick="addFavoriteConcert(1)">찜하기</button>
