<!-- Login 페이지에서 ID와 Password를 입력받아서 DB에 저장된 값을 비교하는 페이지 -->
<!-- DB에 저장된 값과 일치하면 로그인 성공 -->
<!-- 그렇지 않다면 등록되지 않은 아이디 or 비밀번호 일치 X를 alert로 출력 -->

<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];

   $con = mysqli_connect("localhost", "user1", "12345", "sample");
   $sql = "select * from members where id='$id'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];

            echo("
              <script>
                location.href = 'index.php';
              </script>
            ");
        }
     }        
?>
