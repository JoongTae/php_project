<!-- 게시글을 삭제할 수 있도록 하는 코드 -->
<!-- 관리자(level==1)만 접근 가능 -->
    
<?php include "header.php"; ?>
<?php

if (!isset($_POST["item_free"]) && !isset($_POST["item_notice"]) && !isset($_POST["item_musician"])) {
    echo("
        <script>
        alert('삭제할 게시글을 선택해주세요!');
        history.go(-1);
        </script>
    ");
    exit;
}

$con = mysqli_connect("localhost", "user1", "12345", "sample");
if (!$con) {
    die("DB 연결 실패: " . mysqli_connect_error());
}

// 자유게시판 게시글 삭제
if (isset($_POST["item_free"])) {
    foreach ($_POST["item_free"] as $num) {
        $num = intval($num); // 정수형으로 변환하여 SQL Injection 방지

        // 파일 삭제
        $sql = "SELECT file_copied FROM free_board WHERE num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $copied_name = $row["file_copied"];
        if ($copied_name) {
            $file_path = "./data/" . $copied_name;
            if (file_exists($file_path)) {
                unlink($file_path); // 파일 삭제
            }
        }

        // 게시글 삭제
        $sql = "DELETE FROM free_board WHERE num = $num";
        mysqli_query($con, $sql);
    }
}

// 뮤지션 게시판 게시글 삭제
if (isset($_POST["item_musician"])) {
    foreach ($_POST["item_musician"] as $num) {
        $num = intval($num); // 정수형으로 변환하여 SQL Injection 방지

        // 파일 삭제
        $sql = "SELECT file_copied FROM musician_board WHERE num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $copied_name = $row["file_copied"];
        if ($copied_name) {
            $file_path = "./data/" . $copied_name;
            if (file_exists($file_path)) {
                unlink($file_path); // 파일 삭제
            }
        }

        // 게시글 삭제
        $sql = "DELETE FROM musician_board WHERE num = $num";
        mysqli_query($con, $sql);
    }
}

// 공연공지 게시판 게시글 삭제
if (isset($_POST["item_notice"])) {
    foreach ($_POST["item_notice"] as $num) {
        $num = intval($num); // 정수형으로 변환하여 SQL Injection 방지

        // 파일 삭제
        $sql = "SELECT file_copied FROM notice_board WHERE num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $copied_name = $row["file_copied"];
        if ($copied_name) {
            $file_path = "./data/" . $copied_name;
            if (file_exists($file_path)) {
                unlink($file_path); // 파일 삭제
            }
        }

        // 게시글 삭제
        $sql = "DELETE FROM notice_board WHERE num = $num";
        mysqli_query($con, $sql);
    }
}

mysqli_close($con);

echo "
    <script>
        alert('선택된 글을 삭제하였습니다.');
        location.href = 'admin.php';
    </script>
";
?>
