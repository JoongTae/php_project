<!-- 로그아웃 버튼을 눌렀을 때 실행되는 코드 -->
<!-- DB와 로컬의 세션을 끊어버림 -->

<?php
  session_start(); // 세션을 시작합니다.
  unset($_SESSION["userid"]); // 세션 변수를 삭제하여 로그아웃 처리합니다.
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  
  echo("
       <script>
          location.href = 'index.php'; // 로그아웃 후 메인 페이지로 이동합니다.
       </script>
       ");
?>
