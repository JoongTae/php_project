<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>
<style>
#admin_box { width: 1700px; margin: 0 auto;}
#member_list .co15 { width: 200px; }
#member_list .col6 { width: 100px; }
#member_list .col7 { width: 80px; }
#member_list .col8 { width: 80px; }
#member_list .col9 { width: 80px; }
#member_list .co20 { width: 80px; }
#member_list .co21 { width: 80px; }
#member_list .co22 { width: 80px; }
#member_list .co23 { width: 80px; }
</style>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
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
					<span class="co22">자기소개</span>
                                        <span class="co23">수정</span>
					<span class="co24">삭제</span>
                                        
				</li>
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from members order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
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
		<form method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"><?=$number?></span>
			<span class="col2"><?=$id?></a></span>
			<span class="col3"><?=$name?></span>
			<span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
			<span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
                        <span class="col6"><?=$address?></span>
			<span class="col7"><?=$phone?></span>
                        <span class="col8"><?=$gender?></span>
                        <span class="col9"><?=$hobby?></span>
                        <span class="co20"><?=$regist_day?></span>
			<span class="co21"><?=$age?></span>
                        <span class="co22"><?=$self?></span>
                        <span class="co23"><button type="submit">수정</button></span>
			<span class="co24"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
		</form>
		</li>	
			
<?php
   	   $number--;
   }
?>
	    </ul>
	    <h3 id="member_title">
	    	관리자 모드 > 게시판 관리
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
		<form method="post" action="admin_board_delete.php">
<?php
	$sql = "select * from board order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글의 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
	  $file_name   = $row["file_name"];
      $regist_day  = $row["regist_day"];
      $regist_day  = substr($regist_day, 0, 10)
?>
		<li>
			<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
			<span class="col2"><?=$number?></span>
			<span class="col3"><?=$name?></span>
			<span class="col4"><?=$subject?></span>
			<span class="col5"><?=$file_name?></span>
			<span class="col6"><?=$regist_day?></span>
		</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);
?>
				<button type="submit">선택된 글 삭제</button>
			</form>
	    </ul>
	</div> <!-- admin_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
