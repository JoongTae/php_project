<!-- 회원 가입 시 DB에 저장된 ID와 입력한 ID를 비교하여 중복 여부를 체크하여 알려주는 코드 -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
h3 {
    padding-left: 5px;
    border-left: solid 5px #edbf07;
}
#close {
    margin: 20px 0 0 80px;
    cursor: pointer;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
   $id = $_GET["id"]; // GET 방식으로 전달된 id 파라미터를 받습니다.

   if (!$id) {
      echo("<li>아이디를 입력해 주세요!</li>"); // 아이디가 입력되지 않은 경우 메시지를 출력합니다.
   } else {
      $con = mysqli_connect("localhost", "user1", "12345", "sample"); // 데이터베이스에 연결합니다.

      $sql = "select * from members where id='$id'"; // 입력된 아이디와 일치하는 레코드를 조회하는 SQL 쿼리입니다.
      $result = mysqli_query($con, $sql); // 쿼리를 실행하고 결과를 받아옵니다.

      $num_record = mysqli_num_rows($result); // 조회된 레코드의 개수를 가져옵니다.

      if ($num_record) {
         echo "<li>".$id." 아이디는 중복됩니다.</li>"; // 아이디가 이미 존재할 경우 중복 메시지를 출력합니다.
         echo "<li>다른 아이디를 사용해 주세요!</li>";
      } else {
         echo "<li>".$id." 아이디는 사용 가능합니다.</li>"; // 아이디가 존재하지 않을 경우 사용 가능 메시지를 출력합니다.
      }
    
      mysqli_close($con); // 데이터베이스 연결을 닫습니다.
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()"> <!-- 팝업을 닫는 버튼 이미지를 클릭하면 현재 창을 닫습니다. -->
</div>
</body>
</html>
