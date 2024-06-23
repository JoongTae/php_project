<!-- 자유 게시판의 게시글을 보여주는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body> 
<header>
    <?php include "header.php";?> <!-- header.php 파일을 포함하여 페이지 상단의 헤더를 출력합니다. -->
</header>  
<section>

   	<div id="board_box">
	    <h3 class="title">
			자유게시판 > 내용보기
		</h3>
<?php
	// URL 매개변수로부터 글 번호와 페이지 번호를 가져옴
	$num  = $_GET["num"]; // num 매개변수를 가져와 $num 변수에 할당합니다.
	$page  = $_GET["page"]; // page 매개변수를 가져와 $page 변수에 할당합니다.

	// 데이터베이스 연결 설정
	$con = mysqli_connect("localhost", "user1", "12345", "sample"); // localhost의 user1 계정으로 데이터베이스에 연결합니다.

	// 글 번호에 해당하는 자유게시판 글 정보를 조회하는 SQL 쿼리
	$sql = "select * from free_board where num=$num"; // num이 $num인 자유게시판 글 정보를 조회하는 SQL 쿼리입니다.
	$result = mysqli_query($con, $sql); // SQL 쿼리를 실행하고 결과를 $result에 저장합니다.

	// 조회된 결과의 첫 번째 행(글 정보)을 가져옴
	$row = mysqli_fetch_array($result); // $result에서 첫 번째 행을 배열 형태로 가져옵니다.
	$id      = $row["id"]; // 글 작성자의 아이디를 가져와 $id 변수에 할당합니다.
	$name      = $row["name"]; // 글 작성자의 이름을 가져와 $name 변수에 할당합니다.
	$regist_day = $row["regist_day"]; // 글 작성일을 가져와 $regist_day 변수에 할당합니다.
	$subject    = $row["subject"]; // 글 제목을 가져와 $subject 변수에 할당합니다.
	$content    = $row["content"]; // 글 내용을 가져와 $content 변수에 할당합니다.
	$file_name    = $row["file_name"]; // 첨부 파일의 원본 파일명을 가져와 $file_name 변수에 할당합니다.
	$file_type    = $row["file_type"]; // 첨부 파일의 타입을 가져와 $file_type 변수에 할당합니다.
	$file_copied  = $row["file_copied"]; // 첨부 파일이 저장된 이름을 가져와 $file_copied 변수에 할당합니다.
	$hit          = $row["hit"]; // 조회수를 가져와 $hit 변수에 할당합니다.

	// 조회수 증가 처리
	$new_hit = $hit + 1; // 조회수를 1 증가시킵니다.
	$sql = "update free_board set hit=$new_hit where num=$num"; // 글 번호가 $num인 글의 조회수를 증가시키는 SQL 쿼리입니다.
	mysqli_query($con, $sql); // SQL 쿼리를 실행합니다.

	// 내용에 있는 공백과 개행 문자를 HTML 형식으로 변환
	$content = str_replace(" ", "&nbsp;", $content); // 공백을 HTML 공백 문자로 변환합니다.
	$content = str_replace("\n", "<br>", $content); // 개행 문자를 <br> 태그로 변환합니다.
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span> <!-- 글 제목을 출력합니다. -->
				<span class="col2"><?=$name?> | <?=$regist_day?></span> <!-- 글 작성자와 작성일을 출력합니다. -->
			</li>
			<li>
				<?php
					// 첨부 파일이 있을 경우 파일 정보와 다운로드 링크 출력
					if($file_name) {
						$real_name = $file_copied; // 실제 저장된 파일명을 가져와 $real_name 변수에 할당합니다.
						$file_path = "./data/".$real_name; // 파일 경로를 설정합니다.
						$file_size = filesize($file_path); // 파일 크기를 가져옵니다.

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='free_board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>"; // 첨부 파일 정보와 다운로드 링크를 출력합니다.
			        }
				?>
				<?=$content?> <!-- 글 내용을 출력합니다. -->
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='free_board_list.php?page=<?=$page?>'">목록</button></li> <!-- 목록 버튼을 클릭하면 자유 게시판 리스트 페이지로 이동합니다. -->
				<li><button onclick="location.href='free_board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li> <!-- 수정 버튼을 클릭하면 글 수정 페이지로 이동합니다. -->
				<li><button onclick="location.href='free_board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li> <!-- 삭제 버튼을 클릭하면 글 삭제 처리를 수행하는 페이지로 이동합니다. -->
				<li><button onclick="location.href='free_board_form.php'">글쓰기</button></li> <!-- 글쓰기 버튼을 클릭하면 새 글 작성 페이지로 이동합니다. -->
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?> <!-- footer.php 파일을 포함하여 페이지 하단의 푸터를 출력합니다. -->
</footer>
</body>
</html>
