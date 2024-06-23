<!-- 회원가입 시 입력하였던 정보를 보여주는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
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
        <?php include "header.php";?>
    </header>
<?php    
    $con = mysqli_connect("localhost", "user1", "12345", "sample"); // MySQL 데이터베이스에 접속

    $sql = "SELECT * FROM members WHERE id='$userid'"; // 현재 로그인된 회원의 정보를 조회하는 SQL 쿼리
    $result = mysqli_query($con, $sql); // SQL 쿼리 실행
    $row = mysqli_fetch_array($result); // 결과를 배열로 가져옴

    // 가져온 회원 정보를 각각의 변수에 저장
    $pass = $row["pass"];
    $name = $row["name"];
    $phone = $row["phone"];
    $age = $row["age"];
    $hobby = $row["hobby"];
    $address = $row["address"];
    $self = $row["self"];
    
    // 이메일 주소를 @ 기준으로 분리하여 출력 형식에 맞게 변수에 저장
    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con); // 데이터베이스 연결 종료
?>
    <section>
    <div id="main_img_ba">
        <img id = imgg src="./img/main_img.jpg">
    </div>
    <div id="main_content">
            <div id="join_box">
            <form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
                <h2>프로필</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <?=$userid?> <!-- 현재 로그인된 회원의 아이디 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <?=$pass?> <!-- 현재 비밀번호 출력 -->
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <?=$name?> <!-- 현재 이름 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form email">
                        <div class="col1">이메일</div>
                        <div class="col2">
                           <?=$email1?>@<?=$email2?> <!-- 현재 이메일 주소 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form phone">
                        <div class="col1">전화 번호</div>
                        <div class="col2">
                            <?=$phone?> <!-- 현재 전화 번호 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form age">
                        <div class="col1">나이</div>
                        <div class="col2">
                            <?=$age?> <!-- 현재 나이 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form hobby">
                        <div class="col1">취미</div>
                        <div class="col2">
                            <?=$hobby?> <!-- 현재 취미 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form address">
                        <div class="col1">주소</div>
                        <div class="col2">
                            <?=$address?> <!-- 현재 주소 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form self">
                        <div class="col1">자기 소개</div>
                        <div class="col2">
                            <?=$self?> <!-- 현재 자기 소개 출력 -->
                        </div>                 
                    </div>
                    <div class="clear"></div>
                        <div class="col1">즐겨찾기</div>
                        <div class="col2">
                            <li><button type="button" onclick="location.href='notice_board_like_list.php'">목록</button></li> <!-- 즐겨찾기 목록 페이지로 이동하는 버튼 -->
                        </div>
            </form>
            </div> <!-- join_box -->
        </div> <!-- main_content -->
    </section> 
    <br><br><br><br><br><br><br>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>
