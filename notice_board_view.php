<!-- 뮤지션 게시판의 게시글을 보여주는 페이지 -->

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
    <?php include "header.php";?>
</header>  
<section>

   	<div id="board_box">
	    <h3 class="title">
			공연공지 게시판 > 내용보기
            </h3>
<?php
	$num  = $_GET["num"]; // GET 파라미터에서 글 번호 받아오기
	$page  = $_GET["page"]; // GET 파라미터에서 페이지 번호 받아오기

	$con = mysqli_connect("localhost", "user1", "12345", "sample"); // 데이터베이스 연결
	$sql = "select * from notice_board where num=$num"; // 해당 글 번호의 게시글 조회 쿼리
	$result = mysqli_query($con, $sql); // 쿼리 실행

	$row = mysqli_fetch_array($result); // 조회된 데이터를 배열로 가져오기
	$id      = $row["id"]; // 작성자 ID 가져오기
	$name      = $row["name"]; // 작성자 이름 가져오기
	$regist_day = $row["regist_day"]; // 등록일 가져오기
	$subject    = $row["subject"]; // 제목 가져오기
	$content    = $row["content"]; // 내용 가져오기
	$file_name    = $row["file_name"]; // 첨부 파일 이름 가져오기
	$file_type    = $row["file_type"]; // 첨부 파일 타입 가져오기
	$file_copied  = $row["file_copied"]; // 첨부 파일 복사된 이름 가져오기
	$hit          = $row["hit"]; // 조회수 가져오기

	$content = str_replace(" ", "&nbsp;", $content); // 내용에서 공백을 HTML 공백 문자로 변환
	$content = str_replace("\n", "<br>", $content); // 내용에서 줄바꿈을 HTML 줄바꿈 태그로 변환

	$new_hit = $hit + 1; // 조회수 증가 처리
	$sql = "update notice_board set hit=$new_hit where num=$num"; // 글 조회수 업데이트 쿼리   
	mysqli_query($con, $sql); // 쿼리 실행
?>		
	    <ul id="view_content">
		<li>
                    <span class="col1"><b>제목 :</b> <?=$subject?></span> <!-- 게시글 제목 출력 -->
                    <span class="col2"><?=$name?> | <?=$regist_day?></span> <!-- 작성자 이름과 등록일 출력 -->
		</li>
		<li>
                    <?php
			if($file_name) {
                            $real_name = $file_copied;
                            $file_path = "./data/".$real_name;
                            $file_size = filesize($file_path);

                            echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       	<a href='notice_board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                        }
                    ?>
			<?=$content?> <!-- 게시글 내용 출력 -->
		</li>		
	    </ul>
	    <ul class="buttons">
                <li><button onclick="location.href='notice_board_list.php?page=<?=$page?>'">목록</button></li> <!-- 목록 버튼 클릭 시 리스트 페이지로 이동 -->
		<li><button onclick="location.href='notice_board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li> <!-- 수정 버튼 클릭 시 수정 폼 페이지로 이동 -->
		<li><button onclick="location.href='notice_board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li> <!-- 삭제 버튼 클릭 시 삭제 처리 페이지로 이동 -->
		<li><button onclick="location.href='notice_board_form.php'">글쓰기</button></li> <!-- 글쓰기 버튼 클릭 시 글 작성 폼 페이지로 이동 -->
            </ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
