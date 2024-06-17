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
    height: 200px;
}
#music{
    width: 20%;
    height: 200px;
}
</style>
<body> 
    <header>
        <?php include "header.php";?>
    </header>
<?php    
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "SELECT * FROM members WHERE id='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
    $phone = $row["phone"];
    $age = $row["age"];
    $hobby = $row["hobby"];
    $address = $row["address"];
    $self = $row["self"];
    
    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
?>
    <section>
    <div id="main_img_ba">
        <img id="music" src="song1.png">
        <img id="music" src="song2.png">
        <img id="music" src="song3.png">
        <img id="music" src="song4.png">
    </div>
    <div id="main_content">
            <div id="join_box">
            <form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
                <h2>프로필</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <?=$userid?>
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <?=$pass?>
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <?=$name?>
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form email">
                        <div class="col1">이메일</div>
                        <div class="col2">
                            <input type="text" name="email1" value="<?=$email1?>">@<input 
                                   type="text" name="email2" value="<?=$email2?>">
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form phone">
                        <div class="col1">전화 번호</div>
                        <div class="col2">
                            <?=$phone?>       
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form age">
                        <div class="col1">나이</div>
                        <div class="col2">
                            <?=$age?>    
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form hobby">
                        <div class="col1">취미</div>
                        <div class="col2">
                            <?=$hobby?>
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form address">
                        <div class="col1">주소</div>
                        <div class="col2">
                            <?=$address?>
                        </div>                 
                    </div>
                    <div class="clear"></div>
                    <div class="form self">
                        <div class="col1">자기 소개</div>
                        <div class="col2">
                            <?=$self?>
                        </div>                 
                    </div>
                    <div id="board_box">
                        <ul class="buttons">
                            <li><button type="button" onclick="location.href='free_board_like_list.php'">목록</button></li>
                        </ul>
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
