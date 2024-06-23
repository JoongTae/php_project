<!-- 회원가입 페이지에서 데이터를 입력받으면 입력받은 데이터를 DB에 전달하는 코드 -->

<?php
$id = $_POST["id"]; // 회원 아이디를 POST로 받아와 변수 $id에 저장
$pass = $_POST["pass"]; // 회원 비밀번호를 POST로 받아와 변수 $pass에 저장
$name = $_POST["name"]; // 회원 이름을 POST로 받아와 변수 $name에 저장
$email1 = $_POST["email1"]; // 이메일 주소의 첫 부분을 POST로 받아와 변수 $email1에 저장
$email2 = $_POST["email2"]; // 이메일 주소의 두 번째 부분(도메인)을 POST로 받아와 변수 $email2에 저장
$level = $_POST["level"]; // 회원 레벨을 POST로 받아와 변수 $level에 저장
$gender = $_POST["gender"]; // 회원 성별을 POST로 받아와 변수 $gender에 저장
$hobbies = $_POST["hobby"]; // 취미 정보를 POST로 받아와 배열 변수 $hobbies에 저장
$age = $_POST["age"]; // 회원 나이를 POST로 받아와 변수 $age에 저장
$phone = $_POST["phone"]; // 회원 전화번호를 POST로 받아와 변수 $phone에 저장
$address = $_POST["address"]; // 회원 주소를 POST로 받아와 변수 $address에 저장
$self = $_POST["self"]; // 자기소개 내용을 POST로 받아와 변수 $self에 저장
$interest = $_POST["interest"]; // 관심사를 POST로 받아와 변수 $interest에 저장

$email = $email1."@".$email2; // 이메일 주소를 완성하여 변수 $email에 저장
$regist_day = date("Y-m-d (H:i)"); // 현재의 '년-월-일-시-분' 형식의 날짜와 시간을 저장

$hobby_str = implode(", ", $hobbies); // 배열 $hobbies를 문자열로 변환하여 변수 $hobby_str에 저장

$con = mysqli_connect("localhost", "user1", "12345", "sample"); // MySQL 데이터베이스에 접속

$sql = "insert into members(id, pass, name, email, regist_day, level, point, gender, hobby, age, phone, address, self) ";
$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', $level, 0, '$gender', '$hobby_str', '$age', '$phone', '$address', '$self')"; // 회원 정보를 삽입하는 SQL 쿼리 생성

mysqli_query($con, $sql); // 데이터베이스에 SQL 쿼리를 실행하여 회원 정보를 등록
mysqli_close($con); // 데이터베이스 연결 종료

echo "
<script>
location.href = 'index.php'; // 회원가입 후에는 인덱스 페이지로 이동하는 자바스크립트 코드 실행
</script>
";
?>
