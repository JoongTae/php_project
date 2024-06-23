<!-- 자유 게시판에서 글쓰기 버튼을 누르면 게시판을 작성할 수 있는 페이지 -->
<!-- 실질적으로 데이터를 입력하는 파일 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.free_board_form.subject.value)
      {
          alert("제목을 입력하세요!");  // 제목이 입력되지 않은 경우 경고 메시지
          document.free_board_form.subject.focus();
          return;
      }
      if (!document.free_board_form.content.value)
      {
          alert("내용을 입력하세요!");  // 내용이 입력되지 않은 경우 경고 메시지
          document.free_board_form.content.focus();
          return;
      }
      document.free_board_form.submit();  // 제목과 내용이 모두 입력된 경우 폼을 서버로 제출
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
    <?php include "header.php";?>  <!-- 상단 헤더를 include하여 웹 페이지에 추가 -->
</header> 
<section>
    <div id="main_img_ba">
        <img id="imgg" src="./img/main_img.jpg">
    </div>
    <div id="board_box">
        <h3 id="board_title">
            자유게시판 > 글 쓰기
        </h3>
        <form name="free_board_form" method="post" action="free_board_insert.php" enctype="multipart/form-data">
             <ul id="board_form">
                <li>
                    <span class="col1">이름 : </span>
                    <span class="col2"><?=$username?></span>  <!-- 사용자 이름을 출력 -->
                </li>       
                <li>
                    <span class="col1">제목 : </span>
                    <span class="col2"><input name="subject" type="text"></span>  <!-- 제목을 입력하는 input 태그 -->
                </li>           
                <li id="text_area">    
                    <span class="col1">내용 : </span>
                    <span class="col2">
                        <textarea name="content"></textarea>  <!-- 내용을 입력하는 textarea 태그 -->
                    </span>
                </li>
                <li>
                    <span class="col1"> 첨부 파일</span>
                    <span class="col2"><input type="file" name="upfile"></span>  <!-- 파일 첨부를 위한 input 태그 -->
                </li>
                </ul>
            <ul class="buttons">
                <li><button type="button" onclick="check_input()">완료</button></li>  <!-- 입력 확인 버튼 -->
                <li><button type="button" onclick="location.href='free_board_list.php'">목록</button></li>  <!-- 목록으로 돌아가는 버튼 -->
            </ul>
        </form>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>  <!-- 하단 푸터를 include하여 웹 페이지에 추가 -->
</footer>
</body>
</html>
