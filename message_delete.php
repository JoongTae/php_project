<!-- 수신/송신 쪽지를 DB에서 삭제하는 코드 -->

<meta charset='utf-8'>

<?php

	$num = $_GET["num"]; // 삭제할 쪽지의 번호를 GET 방식으로 받음

	$mode = $_GET["mode"]; // 삭제할 쪽지함 모드를 GET 방식으로 받음



	$con = mysqli_connect("localhost", "user1", "12345", "sample"); // DB 연결

	$sql = "delete from message where num=$num"; // 해당 번호의 쪽지를 삭제하는 SQL 문장

	mysqli_query($con, $sql); // SQL 문장 실행

	mysqli_close($con); // DB 연결 종료



	// 삭제 후 이동할 페이지 설정
	if($mode == "send")
		$url = "message_box.php?mode=send";
	else
		$url = "message_box.php?mode=rv";

	// 삭제 후 페이지 이동을 JavaScript로 처리
	echo "
	<script>
		location.href = '$url';
	</script>
	";

?>

