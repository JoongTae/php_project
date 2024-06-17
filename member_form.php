<!-- 메인에서 회원가입 버튼을 눌러 실질적으로 정보를 입력할 수 있도록 화면에 보여주는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script>
   function check_input()
   {
      if (!document.member_form.id.value) {
          alert("아이디를 입력하세요!");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
      document.member_form.id.focus();
      return;
   } 

   function check_id() {
     window.open("member_check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
</script>
</head>
<style>
    #main_img_ba{
    background-color:black;
    height: 250px;
}
#imgg{
    width: 20%;
    height: 250px;
}
</style>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
		<div id="main_img_ba">
                    <img id="imgg" src="song1.png">
                    <img id="imgg" src="song2.png">
                    <img id="imgg" src="song3.png">
                    <img id="imgg" src="song4.png">
                </div>
        <div>
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_insert.php">
			    <h2>회원 가입</h2>
                                <div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
				        </div>                 
			       	</div>
                            
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
                                
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
                                
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
                                
                                <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">주소</div>
				        <div class="col2">
							<input type="text" name="address">
				        </div>                 
			       	</div>
                                
                                <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">나이</div>
				        <div class="col2">
							<input type="text" name="age">
				        </div>                 
			       	</div>
                                
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1">@<input type="text" name="email2">
				        </div>                 
			       	</div>
                                
                                 <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">전화 번호</div>
				        <div class="col2">
							<input type="text" name="phone">
				        </div>                 
			       	</div>
                                 
                                <div class="clear"></div>
			       	<div class="form">
				        <div class="col1">자기 소개</div>
				        <div class="col2">
							<input type="text" name="self">
				        </div>                 
			       	</div>
                                
                                <div>성별   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 남성<input type="radio" name="gender" value="남" checked>
                                     &nbsp &nbsp 여성<input type="radio" name="gender" value="여" ></div> <br>
                                <div> 
                                    
                                <div class="hobby">
                                    관심분야 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                                                
                                 <label for="JAZZ">재즈</label>
                                 <input type="checkbox" id="jazz" name="hobby[]" value="jazz">
                                  &nbsp&nbsp&nbsp
                                 
                                 <label for="CLASSIC">클래식</label>
                                 <input type="checkbox" id="clasic" name="hobby[]" value="calsic">
                                  &nbsp&nbsp&nbsp
                                 
                                 <label for="POP">POP</label>
                                 <input type="checkbox" id="POP" name="hobby[]" value="POP">
                                  &nbsp&nbsp&nbsp
                                 <label for="edm">EDM</label>
                                 <input type="checkbox" id="EDM" name="hobby[]" value="EDM">
                                  &nbsp&nbsp&nbsp
                                 <label for="IDOL">아이돌</label>
                                 <input type="checkbox" id="idol" name="hobby[]" value="idol">
                                </div> <br>
                                    
                                <div>회원 구분 &nbsp &nbsp &nbsp &nbsp 회원<input type="radio" name="level" value = "2" checked>
                                     &nbsp &nbsp 뮤지션<input type="radio" name="level" value = "3"></div>
                                
                                    
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

