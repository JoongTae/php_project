<!-- 공연공지 게시판 게시글의 '즐겨찾기'버튼을 누르면 DB에 게시글이 전달되어 저장되는 코드 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body> 
<header>
    <?php include "header.php"; ?>
</header>
<section>
<?php

// 로그인 확인
if (!isset($_SESSION["userid"])) {
    echo "<script>
            alert('로그인 후 이용해 주세요!');
            location.href = 'login_form.php';
          </script>";
    exit;
}

$user_id = $_SESSION["userid"];
$num = $_GET["num"];
$page = $_GET["page"];

$con = mysqli_connect("localhost", "user1", "12345", "sample");

// 게시물이 이미 즐겨찾기 되었는지 확인
$sql_check = "SELECT * FROM like_board WHERE user_id='$user_id' AND board_num=$num";
$result_check = mysqli_query($con, $sql_check);

if (mysqli_num_rows($result_check) == 0) {
    // 아직 즐겨찾기하지 않은 경우 like_board에 삽입
    $sql_insert = "INSERT INTO like_board (user_id, board_num) VALUES ('$user_id', $num)";
    mysqli_query($con, $sql_insert);
    echo "<script>
            alert('게시물을 즐겨찾기했습니다.');
            location.href = 'notice_board_view.php?num=$num&page=$page';
          </script>";
} else {
    // 이미 즐겨찾기한 경우 경고 메시지 출력
    echo "<script>
            alert('이미 즐겨찾기한 게시물입니다.');
            location.href = 'notice_board_view.php?num=$num&page=$page';
          </script>";
}

mysqli_close($con);
?>
</section>
<footer>
    <?php include "footer.php"; ?>
</footer>
</body>
</html>
