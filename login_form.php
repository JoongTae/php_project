<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<script type="text/javascript" src="./js/login.js"></script>
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
    	<?php include "header.php";?> <!-- 헤더 파일을 포함하여 페이지 상단의 헤더를 출력합니다. -->
    </header>
	<section>
		<div id="main_img_ba">
            <img id="imgg" src="./img/main_img.jpg"> <!-- 메인 이미지를 출력합니다. -->
        </div>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span> <!-- 로그인 타이틀을 출력합니다. -->
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php"> <!-- 로그인 폼을 설정하고, 데이터를 login.php로 전송합니다. -->		       	
                  	<ul>
                        <li><input type="text" name="id" placeholder="아이디" ></li> <!-- 아이디 입력 필드를 출력합니다. -->
                        <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- 비밀번호 입력 필드를 출력합니다. -->
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/login.png" onclick="check_input()"></a> <!-- 로그인 버튼을 이미지로 출력하고, 클릭 시 check_input 함수를 호출합니다. -->
                  	</div>		    	
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?> <!-- 푸터 파일을 포함하여 페이지 하단의 푸터를 출력합니다. -->
    </footer>
</body>
</html>
