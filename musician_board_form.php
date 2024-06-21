
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.musician_board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.musician_board_form.subject.focus();
          return;
      }
      if (!document.musician_board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.musician_board_form.content.focus();
          return;
      }
      document.musician_board_form.submit();
   }
</script>
<style>
#main_img_ba{
    background-color:black;
    height: 250px;
}
#imgg{
    width: 100%;
    height: 250px;
}
</style>
</head>
<body> 
<header>
    <?php include "header.php";?>
    <?php
if ($userlevel == 2) {
    echo "<script>alert('접근 불가 : 일반 회원은 작성할 수 없습니다.'); history.go(-1);</script>";
    exit;
}
?>
</header> 
<section>
    <div id="main_img_ba">
        <img id = imgg src="./img/main_img.jpg">
    </div>
    <div id="board_box">
        <h3 id="board_title">
            뮤지션 게시판 > 글 쓰기
        </h3>
        <form name="musician_board_form" method="post" action="musician_board_insert.php" enctype="multipart/form-data">
             <ul id="board_form">
                <li>
                    <span class="col1">이름 : </span>
                    <span class="col2"><?=$username?></span>
                </li>       
                <li>
                    <span class="col1">제목 : </span>
                    <span class="col2"><input name="subject" type="text"></span>
                </li>           
                <li id="text_area">    
                    <span class="col1">내용 : </span>
                    <span class="col2">
                        <textarea name="content"></textarea>
                    </span>
                </li>
                <li>
                    <span class="col1"> 첨부 파일</span>
                    <span class="col2"><input type="file" name="upfile"></span>
                </li>
                </ul>
            <ul class="buttons">
                <li><button type="button" onclick="check_input()">완료</button></li>
                <li><button type="button" onclick="location.href='musician_board_list.php'">목록</button></li>
            </ul>
        </form>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
