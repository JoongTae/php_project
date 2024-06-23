<!-- 입력받은 쪽지를 DB에 전달하여 저장 -->

<meta charset='utf-8'>
<?php
    $send_id = $_GET["send_id"]; // GET 방식으로 보낸 사람 ID를 받음

    $rv_id = $_POST['rv_id']; // 폼에서 입력한 수신자 ID를 POST 방식으로 받음
    $subject = $_POST['subject']; // 폼에서 입력한 제목을 POST 방식으로 받음
    $content = $_POST['content']; // 폼에서 입력한 내용을 POST 방식으로 받음
	$subject = htmlspecialchars($subject, ENT_QUOTES); // 제목에 포함된 특수 문자를 HTML 엔터티로 변환
	$content = htmlspecialchars($content, ENT_QUOTES); // 내용에 포함된 특수 문자를 HTML 엔터티로 변환
	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	if(!$send_id) {
		echo("
			<script>
			alert('로그인 후 이용해 주세요! ');
			history.go(-1)
			</script>
			");
		exit;
	}

	$con = mysqli_connect("localhost", "user1", "12345", "sample"); // DB 연결
	$sql = "select * from members where id='$rv_id'"; // 수신자 ID가 회원 테이블에 있는지 확인하는 SQL 문장
	$result = mysqli_query($con, $sql); // SQL 문장 실행
	$num_record = mysqli_num_rows($result); // 결과 레코드 수를 가져옴

	if($num_record)
	{
		// 쪽지를 message 테이블에 저장하는 SQL 문장
		$sql = "insert into message (send_id, rv_id, subject, content,  regist_day) ";
		$sql .= "values('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
		mysqli_query($con, $sql);  // SQL 문장 실행
	} else {
		// 수신 아이디가 존재하지 않을 경우 경고 메시지 출력 후 이전 페이지로 이동
		echo("
			<script>
			alert('수신 아이디가 잘못 되었습니다!');
			history.go(-1)
			</script>
			");
		exit;
	}

	mysqli_close($con);                // DB 연결 끊기

	// 쪽지 전송 후 송신 쪽지함 페이지로 이동하는 JavaScript 코드 출력
	echo "
	   <script>
	    location.href = 'message_box.php?mode=send';
	   </script>
	";
?>
