<!-- 회원정보를 수정할 수 있도록 하는 코드 -->
<!-- 관리자(level==1)만 접근 가능 -->

<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    // 관리자가 아니면 접근 불가
    if ($userlevel != 1) {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num = $_GET["num"]; // 수정할 회원 번호
    $level = $_POST["level"]; // 수정할 회원 레벨
    $point = $_POST["point"]; // 수정할 회원 포인트

    $con = mysqli_connect("localhost", "user1", "12345", "sample"); // 데이터베이스 연결
    $sql = "update members set level=$level, point=$point where num=$num"; // 회원 정보 수정 쿼리
    mysqli_query($con, $sql); // 쿼리 실행

    mysqli_close($con); // 데이터베이스 연결 종료

    echo "
         <script>
             location.href = 'admin.php'; // 관리자 페이지로 리디렉션
         </script>
       ";
?>
