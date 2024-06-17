<!-- 자유 게시판에서 수정 버튼을 누르면 실질적으로 데이터가 수정할 수 있도록 변경하는 페이지-->

<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update musician_board set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'musician_board_list.php?page=$page';
	      </script>
	  ";
?>

   
