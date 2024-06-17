<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트 </title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<style>

#main_img_ba{
    background-color:skyblue;
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
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
    $phone=$row["phone"];
    $age = $row["age"];
    $hobby = $row["hobby"];
    $address = $row["address"];
    $self= $row["self"];
    
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
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
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
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
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
                                            <input type="text" name="phone" value="<?=$phone?>">      
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form age">
				        <div class="col1">나이</div>
				        <div class="col2">
                                            <input type="text" name="age" value="<?=$age?>">	      
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form hobby">
				        <div class="col1">취미</div>
				        <div class="col2">
                                            <input type="text" name="hobby" value="<?=$hobby?>">
							      
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form address">
				        <div class="col1">주소</div>
				        <div class="col2">
                                            <input type="text" name="address" value="<?=$address?>">
							      
				        </div>                 
			       	</div>
                                <div class="clear"></div>
			       	<div class="form self">
				        <div class="col1">자기 소개</div>
				        <div class="col2">
                                            <input type="text" name="self" value="<?=$self?>">
							      
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
        
    <br><br><br><br><br><br><br><br><br><br>    
    
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

