<?php
    // POST로 전달된 사용자 입력 값 가져오기
    $id   = $_POST["id"]; // 입력된 아이디
    $pass = $_POST["pass"]; // 입력된 비밀번호

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    
    // 입력된 아이디를 이용하여 회원 정보 조회
    $sql = "select * from members where id='$id'";
    $result = mysqli_query($con, $sql);

    // 조회된 결과의 행 수 확인
    $num_match = mysqli_num_rows($result);

    // 등록된 아이디가 없는 경우
    if(!$num_match) 
    {
        // 경고창을 띄우고 이전 페이지로 이동
        echo("
            <script>
                window.alert('등록되지 않은 아이디입니다!')
                history.go(-1)
            </script>
        ");
    }
    else
    {
        // 조회된 결과에서 비밀번호 가져오기
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"]; // 데이터베이스에 저장된 비밀번호

        // 데이터베이스 연결 종료
        mysqli_close($con);

        // 입력된 비밀번호와 데이터베이스에 저장된 비밀번호 비교
        if($pass != $db_pass)
        {
            // 비밀번호가 일치하지 않는 경우 경고창을 띄우고 이전 페이지로 이동
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
            // 로그인 성공 시 세션 시작 및 필요한 정보 세션 변수에 저장
            session_start();
            $_SESSION["userid"] = $row["id"]; // 사용자 아이디
            $_SESSION["username"] = $row["name"]; // 사용자 이름
            $_SESSION["userlevel"] = $row["level"]; // 사용자 등급
            $_SESSION["userpoint"] = $row["point"]; // 사용자 포인트

            // 로그인 성공 후 메인 페이지로 이동
            echo("
                <script>
                    location.href = 'index.php';
                </script>
            ");
        }
    }
?>
