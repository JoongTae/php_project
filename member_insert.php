<!-- 회원가입 페이지에서 데이터를 입력받으면 입력받은 데이터를 DB에 전달하는 코드 -->

<?php
$id = $_POST["id"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$level = $_POST["level"];
$gender = $_POST["gender"];
$hobbies = $_POST["hobby"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$self = $_POST["self"];
$interest = $_POST["interest"];

$email = $email1."@".$email2;
$regist_day = date("Y-m-d (H:i)"); // 현재의 '년-월-일-시-분'을 저장

$hobby_str = implode(", ", $hobbies);

$con = mysqli_connect("localhost", "user1", "12345", "sample");

$sql = "insert into members(id, pass, name, email, regist_day, level, point, gender, hobby, age, phone, address, self) ";
$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', $level, 0, '$gender', '$hobby_str', '$age', '$phone', '$address', '$self')";

mysqli_query($con, $sql); // $sql 에 저장된 명령 실행
mysqli_close($con);

echo "
<script>
location.href = 'index.php';
</script>
";
?>
