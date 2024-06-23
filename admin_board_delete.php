<!-- 게시글을 삭제할 수 있도록 하는 코드 -->
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

    // 삭제할 게시글이 선택되지 않았을 경우
    if (!isset($_POST["item_free"]) && !isset($_POST["item_notice"]) && !isset($_POST["item_musician"])) {
        echo("
            <script>
            alert('삭제할 게시글을 선택해주세요!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    // 자유게시판 게시글 삭제
    if (isset($_POST["item_free"])) {
        $num_item_free = count($_POST["item_free"]);
        for ($i = 0; $i < $num_item_free; $i++) {
            $num = $_POST["item_free"][$i];

            $sql = "select * from free_board where num = $num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $copied_name = $row["file_copied"];

            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path); // 파일 삭제
            }

            $sql = "delete from free_board where num = $num";
            mysqli_query($con, $sql);
        }
    }

    // 뮤지션 게시판 게시글 삭제
    if (isset($_POST["item_musician"])) {
        $num_item_musician = count($_POST["item_musician"]);
        for ($i = 0; $i < $num_item_musician; $i++) {
            $num = $_POST["item_musician"][$i];

            $sql = "select * from musician_board where num = $num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $copied_name = $row["file_copied"];

            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path); // 파일 삭제
            }

            $sql = "delete from musician_board where num = $num";
            mysqli_query($con, $sql);
        }
    }

    // 공연공지 게시판 게시글 삭제
    if (isset($_POST["item_notice"])) {
        $num_item_notice = count($_POST["item_notice"]);
        for ($i = 0; $i < $num_item_notice; $i++) {
            $num = $_POST["item_notice"][$i];

            $sql = "select * from notice_board where num = $num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $copied_name = $row["file_copied"];

            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path); // 파일 삭제
            }

            $sql = "delete from notice_board where num = $num";
            mysqli_query($con, $sql);
        }
    }

    mysqli_close($con);

    echo "
        <script>
            location.href = 'admin.php';
        </script>
    ";
?>
