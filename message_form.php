<!-- DB에 저장되어 있는 회원에게 쪽지를 보낼 수 있도록 정보를 입력하는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
  function check_input() {
      // 수신 아이디가 입력되지 않았을 경우 경고 메시지 출력
      if (!document.message_form.rv_id.value)
      {
          alert("수신 아이디를 입력하세요!");
          document.message_form.rv_id.focus();
          return;
      }
      // 제목이 입력되지 않았을 경우 경고 메시지 출력
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.message_form.subject.focus();
          return;
      }
      // 내용이 입력되지 않았을 경우 경고 메시지 출력
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.message_form.content.focus();
          return;
      }
      // 모든 입력 사항이 완료되었으면 폼을 서버로 제출
      document.message_form.submit();
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
    <?php include "header.php";?>
</header>  
<?php
    // 로그인 여부 확인 후 로그인되지 않았을 경우 경고창을 띄우고 이전 페이지로 이동
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>
<section>
    <div id="main_img_ba">
        <img id = imgg src="./img/main_img.jpg">
    </div>
    <div id="message_box">
        <h3 id="write_title">
                쪽지 보내기
            </h3>
        <ul class="top_buttons">
                <li><span><a href="message_box.php?mode=rv">수신 쪽지함 </a></span></li>
                <li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li>
        </ul>
        <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
            <div id="write_msg">
                <ul>
            <li>
                <span class="col1">보내는 사람 : </span>
                <span class="col2"><?=$userid?></span>
            </li>    
            <li>
                <span class="col1">수신 아이디 : </span>
                <span class="col2"><input name="rv_id" type="text"></span>
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
                </ul>
                <!-- 보내기 버튼 클릭 시 입력 확인 함수 실행 -->
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
