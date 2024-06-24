<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<style>
#main_img_ba{
    background-color:black;
    height: 250px;
}
#imgg{
    width: 100%;
    height: 250px;
}
#board_list .col1 { width: 50px; }
#board_list .col2 { width: 50px; }
#board_list .col3 { width: 150px; }
#board_list .col4 { width: 60px; }
#board_list .col5 { width: 120px; }
#board_list .col6 { width: 150px; }
#board_list .col7 { width: 60px; }
</style>
</head>
<body>
<header>
    <?php include "header.php";?>
</header>  
    
<section>
    <div id="main_img_ba">
        <img id="imgg" src="./img/main_img.jpg">
    </div>
    <div id="board_box">
        <h3>
            공연공지 게시판 > 즐겨찾기 목록
        </h3>
        <form name="like_form" method="post" action="notice_board_like_delete.php">
            <ul id="board_list">
                <li>
                    <span class="col1">번호</span>
                    <span class="col2">선택</span>
                    <span class="col3">제목</span>
                    <span class="col4">글쓴이</span>
                    <span class="col5">첨부파일</span>
                    <span class="col6">등록일</span>
                    <span class="col7">조회</span>
                </li>
                <?php
                if (!isset($_SESSION["userid"])) {
                    echo "<script>
                            alert('로그인 후 이용해 주세요!');
                            location.href = 'login_form.php';
                          </script>";
                    exit;
                }

                $userid = $_SESSION["userid"];
                $page = isset($_GET["page"]) ? $_GET["page"] : 1;

                $con = mysqli_connect("localhost", "user1", "12345", "sample");
                $sql = "SELECT b.* FROM notice_board b JOIN like_board f ON b.num = f.board_num WHERE f.user_id='$userid' ORDER BY b.num DESC";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result);

                $scale = 10;
                $total_page = ceil($total_record / $scale);
                $start = ($page - 1) * $scale;
                $number = $total_record - $start;

                for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                    mysqli_data_seek($result, $i);
                    $row = mysqli_fetch_array($result);
                    $num = $row["num"];
                    $name = $row["name"];
                    $subject = $row["subject"];
                    $regist_day = $row["regist_day"];
                    $hit = $row["hit"];
                    $file_image = $row["file_name"] ? "<img src='./img/file.gif' alt='첨부파일'>" : " ";
                    ?>
                    <li>
                        <span class="col1"><?=$number?></span>
                        <span class="col2"><input type="checkbox" name="like[]" value="<?=$num?>"></span>
                        <span class="col3"><a href="notice_board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
                        <span class="col4"><?=$name?></span>
                        <span class="col5"><?=$file_image?></span>
                        <span class="col6"><?=$regist_day?></span>
                        <span class="col7"><?=$hit?></span>
                    </li>
                    <?php
                    $number--;
                }
                mysqli_close($con);
                ?>
            </ul>
            <ul id="page_num">
                <?php
                if ($total_page >= 2 && $page >= 2) {
                    $new_page = $page - 1;
                    echo "<li><a href='notice_board_like_list.php?page=$new_page'>◀ 이전</a></li>";
                } else {
                    echo "<li>&nbsp;</li>";
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page == $i) {
                        echo "<li><b>$i</b></li>";
                    } else {
                        echo "<li><a href='notice_board_like_list.php?page=$i'>$i</a></li>";
                    }
                }

                if ($total_page >= 2 && $page != $total_page) {
                    $new_page = $page + 1;
                    echo "<li><a href='notice_board_like_list.php?page=$new_page'>다음 ▶</a></li>";
                } else {
                    echo "<li>&nbsp;</li>";
                }
                ?>
            </ul>
            <ul class="buttons">
                <li><button type="submit">선택 삭제</button></li>
                <li><button type="button" onclick="location.href='notice_board_list.php'">목록</button></li>
                <li>
                    <?php if ($userid) { ?>
                    <button type="button" onclick="location.href='notice_board_form.php'">글쓰기</button>
                    <?php } else { ?>
                    <a href="javascript:alert('로그인 후 이용해 주세요!')"><button type="button">글쓰기</button></a>
                    <?php } ?>
                </li>
            </ul>
        </form>
    </div>
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
