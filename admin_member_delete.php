<!-- 회원을 삭제할 수 있도록 하는 코드 -->
<!-- 관리자(level==1)만 접근 가능 -->

<?php
    session_start();
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";

    // 관리자가 아니면 접근 불가
    if ($userlevel != 1) {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num = $_GET["num"]; // 삭제할 회원 번호

    $con = mysqli_connect("localhost", "user1", "12345", "sample"); // 데이터베이스 연결
    $sql = "delete from members where num = $num"; // 회원 삭제 쿼리
    mysqli_query($con, $sql); // 쿼리 실행

    mysqli_close($con); // 데이터베이스 연결 종료

    echo "
         <script>
             location.href = 'admin.php'; // 관리자 페이지로 리디렉션
         </script>
       ";
?>
