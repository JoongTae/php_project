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
session_start();
if (!isset($_SESSION["userid"])) {
    echo "<script>
            alert('로그인 후 이용해 주세요!');
            location.href = 'login_form.php';
          </script>";
    exit;
}

$user_id = $_SESSION["userid"];

if (isset($_POST["like"])) {
    $likes = $_POST["like"];
    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    foreach ($likes as $num) {
        $sql_delete = "DELETE FROM like_board WHERE user_id='$user_id' AND board_num=$num";
        mysqli_query($con, $sql_delete);
    }

    mysqli_close($con);
    echo "<script>
            alert('선택한 즐겨찾기를 삭제했습니다.');
            location.href = 'notice_board_like_list.php';
          </script>";
} else {
    echo "<script>
            alert('삭제할 즐겨찾기를 선택해 주세요.');
            location.href = 'notice_board_like_list.php';
          </script>";
}
?>
</section>
<footer>
    <?php include "footer.php"; ?>
</footer>
</body>
</html>
