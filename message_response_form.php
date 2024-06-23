<!-- 쪽지를 받았을 때 답변 쪽지를 작성할 수 있도록 하는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
  // 입력 값 검사 함수
  function check_input() {
      // 제목 입력 여부 확인
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.message_form.subject.focus();
          return;
      }
      // 내용 입력 여부 확인
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.message_form.content.focus();
          return;
      }
      // 폼 전송
      document.message_form.submit();
   }
</script>
</head>
<style>
    /* 메인 이미지 스타일 */
    #main_img_ba{
        background-color:black;
        height: 250px;
    }
    /* 이미지 스타일 */
    #imgg{
        width: 100%;
        height: 250px;
    }
</style>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="main_img_ba">
        <img id="imgg" src="./img/main_img.jpg">
    </div>
   	<div id="message_box">
	    <h3 id="write_title">
	    		답변 쪽지 보내기
		</h3>
<?php
	$num  = $_GET["num"];

	// 데이터베이스 연결
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	// 쿼리문 실행
	$sql = "select * from message where num=$num";
	$result = mysqli_query($con, $sql);

	// 결과 레코드 가져오기
	$row = mysqli_fetch_array($result);
	$send_id      = $row["send_id"];
	$rv_id      = $row["rv_id"];
	$subject    = $row["subject"];
	$content    = $row["content"];

	// 제목과 내용 형식 변환
	$subject = "RE: ".$subject; 
	$content = "> ".$content; 
	$content = str_replace("\n", "\n>", $content);
	$content = "\n\n\n-----------------------------------------------\n".$content;

	// 보내는 사람 정보 가져오기
	$result2 = mysqli_query($con, "select name from members where id='$send_id'");
	$record = mysqli_fetch_array($result2);
	$send_name    = $record["name"];
?>		
	    <form name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
	    	<input type="hidden" name="rv_id" value="<?=$send_id?>">
	    	<div id="write_msg">
	    	    <ul>
			<li>
				<span class="col1">보내는 사람 : </span>
				<span class="col2"><?=$userid?></span>
			</li>	
			<li>
				<span class="col1">수신 아이디 : </span>
				<span class="col2"><?=$send_name?>(<?=$send_id?>)</span>
			</li>	
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">글 내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	    <button type="button" onclick="check_input()">보내기</button>
	    	</div>
	    </form>
	</div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
