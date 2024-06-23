<!-- 공연공지 게시판에서 작성한 정보를 DB에 넘기는 코드-->

<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];  // 세션에서 사용자 아이디 가져오기
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];  // 세션에서 사용자 이름 가져오기
    else $username = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");  // 로그인 되어 있지 않으면 경고 메시지 출력 후 이전 페이지로 이동
                exit;
    }

    $subject = $_POST["subject"];  // 게시글 제목 가져오기
    $content = $_POST["content"];  // 게시글 내용 가져오기

	$subject = htmlspecialchars($subject, ENT_QUOTES);  // 특수 문자를 HTML 엔터티로 변환
	$content = htmlspecialchars($content, ENT_QUOTES);  // 특수 문자를 HTML 엔터티로 변환

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$upload_dir = './data/';  // 파일 업로드 디렉토리 설정

	$upfile_name	 = $_FILES["upfile"]["name"];  // 업로드한 파일명 가져오기
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];  // 업로드된 임시 파일명 가져오기
	$upfile_type     = $_FILES["upfile"]["type"];  // 업로드된 파일의 MIME 타입 가져오기
	$upfile_size     = $_FILES["upfile"]["size"];  // 업로드된 파일의 크기 가져오기
	$upfile_error    = $_FILES["upfile"]["error"];  // 업로드 시 발생한 오류 코드 가져오기

	if ($upfile_name && !$upfile_error)
	{
		$file = explode(".", $upfile_name);  // 파일명에서 확장자 추출
		$file_name = $file[0];  // 파일명
		$file_ext  = $file[1];  // 확장자

		$new_file_name = date("Y_m_d_H_i_s");  // 새로운 파일명 생성
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;  // 복사된 파일명 설정      
		$uploaded_file = $upload_dir.$copied_file_name;  // 파일이 업로드될 경로 설정

		if( $upfile_size  > 1000000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");  // 파일 크기가 1MB를 초과하면 경고 메시지 출력 후 이전 페이지로 이동
				exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");  // 파일을 지정한 디렉토리에 복사하는데 실패하면 경고 메시지 출력 후 이전 페이지로 이동
				exit;
		}
	}
	else 
	{
		$upfile_name      = "";  // 파일명 초기화
		$upfile_type      = "";  // 파일 타입 초기화
		$copied_file_name = "";  // 복사된 파일명 초기화
	}
	
	$con = mysqli_connect("localhost", "user1", "12345", "sample");  // 데이터베이스 연결

	$sql = "insert into notice_board (id, name, subject, content, regist_day, hit,  file_name, file_type, file_copied) ";
	$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);  // 게시글 정보 DB에 삽입

	// 포인트 부여하기
  	$point_up = 100;

	$sql = "select point from members where id='$userid'";  // 사용자의 현재 포인트 조회
	$result = mysqli_query($con, $sql);  // 쿼리 실행
	$row = mysqli_fetch_array($result);  // 결과 가져오기
	$new_point = $row["point"] + $point_up;  // 포인트 증가
	
	$sql = "update members set point=$new_point where id='$userid'";  // 사용자의 포인트 업데이트
	mysqli_query($con, $sql);  // 쿼리 실행

	mysqli_close($con);  // 데이터베이스 연결 해제

	echo "
	   <script>
	    location.href = 'notice_board_list.php';
	   </script>
	";  // 자바스크립트를 통한 페이지 이동
?>

  
