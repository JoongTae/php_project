<!-- 메인 버튼을 눌렀을 때 보여주는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body> 
	<header>
    	<?php include "header.php";?> <!-- header.php 파일을 포함하여 헤더를 출력합니다. -->
    </header>
	<section>
	    <?php include "main.php";?> <!-- main.php 파일을 포함하여 메인 콘텐츠를 출력합니다. -->
	</section> 
	<footer>
    	<?php include "footer.php";?> <!-- footer.php 파일을 포함하여 푸터를 출력합니다. -->
    </footer>
</body>
</html>
