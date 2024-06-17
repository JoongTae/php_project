<!-- 자유 게시판에서 게시판 수정을 누르면 보이는 페이지-->

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
          alert("제목을 입력하세요!");
          document.free_board_form.subject.focus();
          return;
      }
      if (!document.free_board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.free_board_form.content.focus();
          return;
      }
      document.free_board_form.submit();
   }
</script>
</head>
<style>
#main_img_ba{
    background-color:black;
    height: 250px;
}
#imgg{
    width: 20%;
    height: 250px;
}
</style>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="main_img_ba">
        <img id = "imgg" src = "song1.png">
        <img id = "imgg" src = "song2.png">
        <img id = "imgg" src = "song3.png">
        <img id = "imgg" src = "song4.png">
    </div>
   	<div id="board_box">
	    <h3 id="board_title">
                자유게시판 > 글 쓰기
	    </h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from free_board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];
?>
	    <form  name="free_board_form" method="post" action="free_board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><?=$file_name?></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='free_board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
