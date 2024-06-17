<!-- 로그아웃 버튼을 눌렀을 때 실행되는 코드 -->
<!-- DB와 로컬의 세션을 끊어버림 -->

<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);
  
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
