<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script>
   function check_input() {
      // 입력 값 검증 로직
      // (생략)
   }

   function reset_form() {
      // 입력 값 초기화 로직
      // (생략)
   }

   function check_id() {
      // 아이디 중복 확인 로직
      // (생략)
   }
</script>
<style>
    /* CSS 스타일링 */
    #main_img_ba {
        background-color: black;
        height: 250px;
    }
    #imgg {
        width: 100%;
        height: 250px;
    }
</style>
</head>
<body> 
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="main_img_ba">
            <img id = imgg src="./img/main_img.jpg">
        </div>
        <div>
            <div id="join_box">
                <form name="member_form" method="post" action="member_insert.php">
                    <h2>회원 가입</h2>
                    <div class="form id">
                        <div class="col1">아이디</div>
                        <div class="col2">
                            <input type="text" name="id" placeholder="아이디를 입력하세요">
                        </div>  
                        <div class="col3">
                            <a href="#"><img src="./img/check_id.gif" onclick="check_id()"></a>
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호</div>
                        <div class="col2">
                            <input type="password" name="pass" placeholder="비밀번호를 입력하세요">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">비밀번호 확인</div>
                        <div class="col2">
                            <input type="password" name="pass_confirm" placeholder="비밀번호를 다시 입력하세요">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">이름</div>
                        <div class="col2">
                            <input type="text" name="name" placeholder="이름을 입력하세요">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">주소</div>
                        <div class="col2">
                            <input type="text" name="address" placeholder="주소를 입력하세요">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">나이</div>
                        <div class="col2">
                            <input type="text" name="age" placeholder="나이를 입력하세요">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form email">
                        <div class="col1">이메일</div>
                        <div class="col2">
                            <input type="text" name="email1" placeholder="이메일">@<input type="text" name="email2" placeholder="이메일 주소">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">전화 번호</div>
                        <div class="col2">
                            <input type="text" name="phone" placeholder="010-xxxx-xxxx">
                        </div>                 
                    </div>
                    
                    <div class="clear"></div>
                    <div class="form">
                        <div class="col1">자기 소개</div>
                        <div class="col2">
                            <input type="text" name="self" placeholder="자기 소개를 20자 이내로 입력하세요">
                        </div>                 
                    </div>
                    
                    <div>성별 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 남성<input type="radio" name="gender" value="남" checked>&nbsp &nbsp 여성<input type="radio" name="gender" value="여"></div> <br>
                    
                    <div class="hobby">
                        관심분야 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <label for="jazz">재즈</label>
                        <input type="checkbox" id="Jazz" name="hobby[]" value="jazz">&nbsp&nbsp&nbsp
                        <label for="clasic">클래식</label>
                        <input type="checkbox" id="Clasic" name="hobby[]" value="classic">&nbsp&nbsp&nbsp
                        <label for="POP">POP</label>
                        <input type="checkbox" id="POP" name="hobby[]" value="POP">&nbsp&nbsp&nbsp
                        <label for="EDM">EDM</label>
                        <input type="checkbox" id="EDM" name="hobby[]" value="EDM">&nbsp&nbsp&nbsp
                        <label for="idol">아이돌</label>
                        <input type="checkbox" id="Idol" name="hobby[]" value="idol">
                    </div> <br>
                    
                    <div>회원 구분 &nbsp &nbsp &nbsp &nbsp 회원<input type="radio" name="level" value="2" checked>&nbsp &nbsp 뮤지션<input type="radio" name="level" value="3"></div>
                    
                    <div class="clear"></div>
                    <div class="bottom_line"></div>
                    <div class="buttons">
                        <img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                        <img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif" onclick="reset_form()">
                    </div>
                </form>
            </div> <!-- join_box -->
        </div> <!-- main_content -->
    </section> 
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>
</html>
