<!-- 정보 수정 페이지에서 정보를 수정한 데이터를 DB에 전달하여 수정하는 코드 -->

<?php
    $id = $_GET["id"]; // GET으로 전달된 회원 아이디를 변수 $id에 저장

    $pass = $_POST["pass"]; // 수정된 회원 비밀번호를 POST로 받아와 변수 $pass에 저장
    $name = $_POST["name"]; // 수정된 회원 이름을 POST로 받아와 변수 $name에 저장
    $email1  = $_POST["email1"]; // 수정된 이메일 주소의 첫 부분을 POST로 받아와 변수 $email1에 저장
    $email2  = $_POST["email2"]; // 수정된 이메일 주소의 두 번째 부분(도메인)을 POST로 받아와 변수 $email2에 저장

    $email = $email1."@".$email2; // 수정된 이메일 주소를 완성하여 변수 $email에 저장
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample"); // MySQL 데이터베이스에 접속

    $sql = "update members set pass='$pass', name='$name' , email='$email'"; // 회원 정보를 수정하는 SQL 쿼리 생성
    $sql .= " where id='$id'"; // 해당 회원 아이디에 맞는 데이터만 수정

    mysqli_query($con, $sql); // 데이터베이스에 SQL 쿼리를 실행하여 회원 정보를 수정
    mysqli_close($con); // 데이터베이스 연결 종료     

    echo "
        <script>
            location.href = 'index.php'; // 정보 수정 후에는 인덱스 페이지로 이동하는 자바스크립트 코드 실행
        </script>
    ";
?>
