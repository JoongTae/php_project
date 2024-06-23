<!-- 뮤지션 게시판의 아무 곳에서 '목록'버튼을 클릭하면 실행되는 페이지-->
<!-- DB에 저장되어 있는 뮤지션 게시판의 게시글을 모두 보여주는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<style>
#main_img_ba{
    background-color:black;
    height: 250px;
}
#imgg{
    width: 100%;
    height: 250px;
}
</style>
<body> 
<header>
    <?php include "header.php";?>  <!-- 헤더 부분 포함 -->
</header>  
<section>
    <div id="main_img_ba">
        <img id = imgg src="./img/main_img.jpg">  <!-- 메인 이미지 표시 -->
    </div>
    <div id="board_box">
        <h3>
            뮤지션게시판 > 목록보기
        </h3>
        <ul id="board_list">
            <li>
                
                <span class="col1">번호</span>
                <span class="col2">제목</span>
                <span class="col3">글쓴이</span>
                <span class="col4">첨부</span>
                <span class="col5">등록일</span>
                <span class="col6">조회</span>
            </li>
            <?php
            if (isset($_GET["page"]))
                $page = $_GET["page"];
            else
                $page = 1;

            $con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from musician_board order by num desc";  // 최신 글 순으로 정렬하여 뮤지션 게시판의 글 가져오기
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result); // 전체 글 수

            $scale = 10;  // 한 페이지에 표시할 글 수

            // 전체 페이지 수($total_page) 계산 
            if ($total_record % $scale == 0)     
                $total_page = floor($total_record/$scale);      
            else
                $total_page = floor($total_record/$scale) + 1; 

            // 표시할 페이지($page)에 따라 $start 계산  
            $start = ($page - 1) * $scale;      

            $number = $total_record - $start;

            for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
            {
                mysqli_data_seek($result, $i);
                // 가져올 레코드로 위치(포인터) 이동
                $row = mysqli_fetch_array($result);
                // 하나의 레코드 가져오기
                $num         = $row["num"];  // 글 번호
                $id          = $row["id"];  // 사용자 아이디
                $name        = $row["name"];  // 사용자 이름
                $subject     = $row["subject"];  // 글 제목
                $regist_day  = $row["regist_day"];  // 등록일
                $hit         = $row["hit"];  // 조회수
                if ($row["file_name"]) {
                    $file_image = "<img src='./img/file.gif' alt='첨부파일'>";  // 첨부 파일이 있으면 이미지 표시
                } else {
                    $file_image = " ";  // 첨부 파일이 없으면 공백 처리
                }
                ?>
                <li>
                    <span class="col1"><?=$number?></span>
                    <span class="col2"><a href="musician_board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$file_image?></span>
                    <span class="col5"><?=$regist_day?></span>
                    <span class="col6"><?=$hit?></span>
                </li>  
                <?php
                $number--;
            }
            mysqli_close($con);  // 데이터베이스 연결 종료
            ?>
        </ul>
        <ul id="page_num">     
            <?php
            if ($total_page>=2 && $page >= 2) {
                $new_page = $page-1;
                echo "<li><a href='musician_board_list.php?page=$new_page'>◀ 이전</a> </li>";  // 이전 페이지 링크
            } else {
                echo "<li>&nbsp;</li>";
            }

            // 게시판 목록 하단에 페이지 링크 번호 출력
            for ($i=1; $i<=$total_page; $i++) {
                if ($page == $i) { // 현재 페이지 번호 링크 안함
                    echo "<li><b> $i </b></li>";
                } else {
                    echo "<li><a href='musician_board_list.php?page=$i'> $i </a><li>";
                }
            }
            if ($total_page>=2 && $page != $total_page) {
                $new_page = $page+1;  
                echo "<li> <a href='musician_board_list.php?page=$new_page'>다음 ▶</a> </li>";  // 다음 페이지 링크
            } else {
                echo "<li>&nbsp;</li>";
            }
            ?>
        </ul> <!-- page -->       
        <ul class="buttons">
            <li><button onclick="location.href='musician_board_list.php'">목록</button></li>  <!-- 목록 버튼 -->
            <li>
                <?php 
                if($userid) {
                ?>
                <button onclick="location.href='musician_board_form.php'">글쓰기</button>  <!-- 로그인 상태에서 글쓰기 버튼 -->
                <?php
                } else {
                ?>
                <a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>  <!-- 비로그인 상태에서는 경고 메시지 출력 -->
                <?php
                }
                ?>
            </li>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>  <!-- 푸터 부분 포함 -->
</footer>
</body>
</html>
