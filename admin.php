<!-- '관리자모드'버튼을 누르면 실행되는 페이지 -->
<!-- 회원과 게시글을 삭제/수정할 수 있는 페이지 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<style>
/* 회원 리스트와 게시판 리스트의 컬럼 스타일 지정 */
#member_list .co15, #member_list .col1, #member_list .col2, #member_list .col3,
#member_list .col4, #member_list .col5, #member_list .col6, #member_list .col7,
#member_list .col8, #member_list .col9, #member_list .co20, #member_list .co21,
#member_list .co22, #member_list .co23, #member_list .co24, #board_list .col1, 
#board_list .col2, #board_list .col3, #board_list .col4, #board_list .col5, 
#board_list .col6 {
    text-align: center; /* 텍스트 가운데 정렬 */
}
#admin_box { width: 1353px; margin: 0 auto;} /* 관리자 박스의 스타일 */
#member_list .co15 { width: 200px; }
#member_list .col6 { width: 100px; }
#member_list .col7 { width: 130px; }
#member_list .col8 { width: 80px; }
#member_list .col9 { width: 150px; }
#member_list .co20 { width: 135px; }
#member_list .co21 { width: 80px; }
#member_list .co22 { width: 80px; }
#member_list .co23 { width: 80px; }
#member_list .co24 { width: 80px;  }
</style>
</head>
<body>
<header>
    <?php include "header.php";?> <!-- 헤더 파일 포함 -->
</header>
<section>
    <div id="admin_box">
        <h3 id="member_title">
            &nbsp관리자 모드 > 회원 관리
        </h3>
        <ul id="member_list">
            <li>
                <span class="col1">번호</span>
                <span class="col2">아이디</span>
                <span class="col3">이름</span>
                <span class="col4">레벨</span>
                <span class="col5">포인트</span>
                <span class="col6">주소</span>
                <span class="col7">전화번호</span>
                <span class="col8">성별</span>
                <span class="col9">취미</span>
                <span class="co20">가입일</span>
                <span class="co21">나이</span>
                <span class="co23">수정</span>
                <span class="co24">삭제</span>
            </li>
<?php
    $con = mysqli_connect("localhost", "user1", "12345", "sample"); // 데이터베이스 연결
    $sql = "select * from members order by num desc"; // 회원 정보를 조회하는 SQL 쿼리
    $result = mysqli_query($con, $sql); // 쿼리 실행
    $total_record = mysqli_num_rows($result); // 전체 회원 수

    $number = $total_record; // 회원 번호 초기화

    while ($row = mysqli_fetch_array($result)) // 각 회원 정보 출력
    {
        $num = $row["num"];
        $id = $row["id"];
        $name = $row["name"];
        $level = $row["level"];
        $point = $row["point"];
        $address = $row["address"];
        $phone = $row["phone"];
        $gender = $row["gender"];
        $hobby = $row["hobby"];
        $age = $row["age"];
        $regist_day = $row["regist_day"];
        $self = $row["self"];
?>
            <li>
                <form method="post" action="admin_member_update.php?num=<?=$num?>"> <!-- 회원 정보 수정 폼 -->
                    <span class="col1"><?=$number?></span>
                    <span class="col2"><?=$id?></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
                    <span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
                    <span class="col6"><?=$address?></span>
                    <span class="col7"><?=$phone?></span>
                    <span class="col8"><?=$gender?></span>
                    <span class="col9"><?=$hobby?></span>
                    <span class="co20"><?=$regist_day?></span>
                    <span class="co21"><?=$age?></span>
                    <span class="co23"><button type="submit">수정</button></span>
                    <span class="co24"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
                </form>
            </li>
<?php
        $number--; // 회원 번호 감소
    }
?>
        </ul>
        <h3 id="member_title">
            &nbsp관리자 모드 > 게시판 관리
        </h3>
        <h3 id="member_title">
            &nbsp자유게시판
        </h3>
        
        <ul id="board_list">
            <li class="title">
                <span class="col1">선택</span>
                <span class="col2">번호</span>
                <span class="col3">이름</span>
                <span class="col4">제목</span>
                <span class="col5">첨부파일명</span>
                <span class="col6">작성일</span>
            </li>
            <form method="post" action="admin_board_delete.php"> <!-- 게시글 삭제 폼 -->
                
<?php
    $sql = "select * from free_board order by num desc"; // 자유게시판 글 조회 쿼리
    $result = mysqli_query($con, $sql); // 쿼리 실행
    $total_record = mysqli_num_rows($result); // 전체 글의 수

    $number = $total_record; // 글 번호 초기화

    while ($row = mysqli_fetch_array($result)) // 각 글 정보 출력
    {
        $num = $row["num"];
        $name = $row["name"];
        $subject = $row["subject"];
        $file_name = $row["file_name"];
        $regist_day = $row["regist_day"];
        $regist_day = substr($regist_day, 0, 10);
?>
                <li>
                    <span class="col1"><input type="checkbox" name="item_free[]" value="<?=$num?>"></span>
                    <span class="col2"><?=$number?></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$subject?></span>
                    <span class="col5"><?=$file_name?></span>
                    <span class="col6"><?=$regist_day?></span>
                </li>
<?php
        $number--; // 글 번호 감소
    }
?>
                <h3 id="member_title">
                    &nbsp뮤지션 게시판 관리
                </h3>
                <li class="title">
                    <span class="col1">선택</span>
                    <span class="col2">번호</span>
                    <span class="col3">이름</span>
                    <span class="col4">제목</span>
                    <span class="col5">첨부파일명</span>
                    <span class="col6">작성일</span>
                </li>
<?php
    $sql = "select * from musician_board order by num desc"; // 뮤지션 게시판 글 조회 쿼리
    $result = mysqli_query($con, $sql); // 쿼리 실행
    $total_record = mysqli_num_rows($result); // 전체 글의 수

    $number = $total_record; // 글 번호 초기화

    while ($row = mysqli_fetch_array($result)) // 각 글 정보 출력
    {
        $num = $row["num"];
        $name = $row["name"];
        $subject = $row["subject"];
        $file_name = $row["file_name"];
        $regist_day = $row["regist_day"];
        $regist_day = substr($regist_day, 0, 10);
?>
                <li>
                    <span class="col1"><input type="checkbox" name="item_musician[]" value="<?=$num?>"></span>
                    <span class="col2"><?=$number?></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$subject?></span>
                    <span class="col5"><?=$file_name?></span>
                    <span class="col6"><?=$regist_day?></span>
                </li>
<?php
        $number--; // 글 번호 감소
    }
?>
                <h3 id="member_title">
                    &nbsp공연공지 게시판 관리
                </h3>
                <li class="title">
                    <span class="col1">선택</span>
                    <span class="col2">번호</span>
                    <span class="col3">이름</span>
                    <span class="col4">제목</span>
                    <span class="col5">첨부파일명</span>
                    <span class="col6">작성일</span>
                </li>
<?php
    $sql = "select * from notice_board order by num desc"; // 공연공지 게시판 글 조회 쿼리
    $result = mysqli_query($con, $sql); // 쿼리 실행
    $total_record = mysqli_num_rows($result); // 전체 글의 수

    $number = $total_record; // 글 번호 초기화

    while ($row = mysqli_fetch_array($result)) // 각 글 정보 출력
    {
        $num = $row["num"];
        $name = $row["name"];
        $subject = $row["subject"];
        $file_name = $row["file_name"];
        $regist_day = $row["regist_day"];
        $regist_day = substr($regist_day, 0, 10);
?>
                <li>
                    <span class="col1"><input type="checkbox" name="item_notice[]" value="<?=$num?>"></span>
                    <span class="col2"><?=$number?></span>
                    <span class="col3"><?=$name?></span>
                    <span class="col4"><?=$subject?></span>
                    <span class="col5"><?=$file_name?></span>
                    <span class="col6"><?=$regist_day?></span>
                </li>
<?php
        $number--; // 글 번호 감소
    }
    mysqli_close($con); // 데이터베이스 연결 종료
?>
                <button type="submit">선택된 글 삭제</button> <!-- 선택된 글 삭제 버튼 -->
            </form>
        </ul>
    </div> <!-- admin_box -->
</section>
<footer>
    <?php include "footer.php";?> <!-- 푸터 파일 포함 -->
</footer>
</body>
</html>
