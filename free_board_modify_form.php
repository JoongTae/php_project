<!-- 자유게시판에서 수정 버튼을 누르면 실질적으로 데이터가 수정할 수 있도록 입력하는 페이지-->

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
          alert("제목을 입력하세요!"); // 제목이 입력되지 않은 경우 경고 메시지를 표시합니다.
          document.free_board_form.subject.focus(); // 제목 입력 필드로 포커스를 이동합니다.
          return;
      }
      if (!document.free_board_form.content.value)
      {
          alert("내용을 입력하세요!"); // 내용이 입력되지 않은 경우 경고 메시지를 표시합니다.
          document.free_board_form.content.focus(); // 내용 입력 필드로 포커스를 이동합니다.
          return;
      }
      document.free_board_form.submit(); // 모든 입력이 유효한 경우 폼을 제출합니다.
   }
</script>
</head>
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
<body> 
<header>
    <?php include "header.php";?> <!-- header.php 파일을 포함하여 페이지 상단의 헤더를 출력합니다. -->
</header>
<section>
    <div id="main_img_ba">
        <img id = imgg src="./img/main_img.jpg">
    </div>
   	<div id="board_box">
	    <h3 id="board_title">
                자유게시판 > 글 수정
	    </h3>
<?php
	$num  = $_GET["num"]; // URL 매개변수로부터 글 번호를 가져와 $num 변수에 할당합니다.
	$page = $_GET["page"]; // URL 매개변수로부터 페이지 번호를 가져와 $page 변수에 할당합니다.
	
	$con = mysqli_connect("localhost", "user1", "12345", "sample"); // localhost의 user1 계정으로 데이터베이스에 연결합니다.
	$sql = "select * from free_board where num=$num"; // num이 $num인 자유게시판 글 정보를 조회하는 SQL 쿼리를 작성합니다.
	$result = mysqli_query($con, $sql); // SQL 쿼리를 실행하고 결과를 $result에 저장합니다.
	$row = mysqli_fetch_array($result); // 결과에서 첫 번째 행을 배열 형태로 가져옵니다.
	$name       = $row["name"]; // 글 작성자의 이름을 가져와 $name 변수에 할당합니다.
	$subject    = $row["subject"]; // 글 제목을 가져와 $subject 변수에 할당합니다.
	$content    = $row["content"]; // 글 내용을 가져와 $content 변수에 할당합니다.
	$file_name  = $row["file_name"]; // 첨부 파일의 원본 파일명을 가져와 $file_name 변수에 할당합니다.
?>
	    <form  name="free_board_form" method="post" action="free_board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span> <!-- 글 작성자의 이름을 출력합니다. -->
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span> <!-- 글 제목을 입력할 수 있는 입력 필드를 출력하고, 기존 제목을 출력합니다. -->
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea> <!-- 글 내용을 입력할 수 있는 입력 필드를 출력하고, 기존 내용을 출력합니다. -->
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><?=$file_name?></span> <!-- 첨부된 파일의 원본 파일명을 출력합니다. -->
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li> <!-- 수정하기 버튼을 클릭하면 입력 값 유효성 검사를 수행하고, 유효할 경우 서버로 데이터를 전송합니다. -->
				<li><button type="button" onclick="location.href='free_board_list.php'">목록</button></li> <!-- 목록 버튼을 클릭하면 자유게시판 리스트 페이지로 이동합니다. -->
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?> <!-- footer.php 파일을 포함하여 페이지 하단의 푸터를 출력합니다. -->
</footer>
</body>
</html>
