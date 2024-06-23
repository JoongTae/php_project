<!-- 뮤지션 게시판의 수정 페이지에서 입력한 정보를 DB에 넘겨 업데이트 하는 코드-->

<?php
    $num = $_GET["num"]; // 수정할 게시물의 번호를 GET 방식으로 받아옴
    $page = $_GET["page"]; // 목록으로 돌아갈 페이지 번호를 GET 방식으로 받아옴

    $subject = $_POST["subject"]; // 수정한 제목을 POST 방식으로 받아옴
    $content = $_POST["content"]; // 수정한 내용을 POST 방식으로 받아옴
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample"); // MySQL 데이터베이스에 접속
    $sql = "update notice_board set subject='$subject', content='$content' "; // 수정된 제목과 내용을 UPDATE 쿼리로 작성
    $sql .= " where num=$num"; // 수정할 게시물의 번호에 해당하는 행을 지정
    mysqli_query($con, $sql); // 쿼리 실행하여 데이터베이스 업데이트 수행

    mysqli_close($con); // 데이터베이스 연결 종료

    echo "
	      <script>
	          location.href = 'notice_board_list.php?page=$page'; // 목록 페이지로 이동하는 자바스크립트 코드
	      </script>
	  ";
?>
