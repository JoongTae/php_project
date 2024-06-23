<!-- 자유 게시판의 수정 페이지에서 입력한 정보를 DB에 넘겨 업데이트 하는 코드-->

<?php
    $num = $_GET["num"];  // 수정할 게시글의 번호를 GET 방식으로 전달받음
    $page = $_GET["page"];  // 목록으로 돌아갈 페이지 번호를 GET 방식으로 전달받음

    $subject = $_POST["subject"];  // 수정된 제목을 POST 방식으로 전달받음
    $content = $_POST["content"];  // 수정된 내용을 POST 방식으로 전달받음
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");  // 데이터베이스 연결
    $sql = "update free_board set subject='$subject', content='$content' ";
    $sql .= " where num=$num";  // 게시글 번호를 기준으로 해당 게시글의 제목과 내용을 업데이트
    mysqli_query($con, $sql);  // SQL 쿼리 실행하여 데이터베이스 업데이트

    mysqli_close($con);  // 데이터베이스 연결 종료

    echo "
        <script>
            location.href = 'free_board_list.php?page=$page';  // 목록 페이지로 이동
        </script>
    ";
?>
