<header>
    <?php include "header.php";?>
</header>
<?php

$num   = $_GET["num"]; // 삭제할 게시글 번호
$page   = $_GET["page"]; // 삭제 후 돌아갈 페이지 번호

$con = mysqli_connect("localhost", "user1", "12345", "sample");

$login_id = $_SESSION['userid'];


// Step 1: 데이터베이스에서 게시글 정보 조회
$sql = "SELECT * FROM musician_board WHERE num = $num";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (!$row) {
    mysqli_close($con);
    echo "
        <script>
            alert('해당 게시글이 존재하지 않습니다.');
            history.go(-1);
        </script>
    ";
    exit;
}

$board_writer = $row['id']; // 게시글 작성자 아이디 가져오기

// Step 2: 게시글 작성자와 로그인한 사용자 비교, 혹은 관리자인지 확인
if ($login_id !== $board_writer || $userlevel != 1) {
    mysqli_close($con);
    echo "
        <script>
            alert('본인이 작성한 글만 삭제할 수 있습니다.');
            history.go(-1);
        </script>
    ";
    exit;
}

// Step 3: 첨부된 파일이 있다면 삭제
$copied_name = $row["file_copied"];
if ($copied_name) {
    $file_path = "./data/".$copied_name;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

// Step 4: 데이터베이스에서 게시글 삭제
$sql = "DELETE FROM musician_board WHERE num = $num";
mysqli_query($con, $sql);

mysqli_close($con);

// Step 5: 리스트 페이지로 리다이렉션
echo "
     <script>
         alert('게시글이 삭제되었습니다.');
         location.href = 'musician_board_list.php?page=$page';
     </script>
   ";
?>
