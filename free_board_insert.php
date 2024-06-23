<!-- 자유 게시판에서 작성한 정보를 DB에 넘기는 코드-->

<!-- meta 태그로 문자 인코딩 설정 -->
<meta charset="utf-8">
<?php
    session_start();  // 세션 시작

    // 세션 변수에서 사용자 정보 가져오기
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    // 로그인 상태가 아닌 경우 경고창을 띄우고 이전 페이지로 이동
    if (!$userid)
    {
        echo("
            <script>
            alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
            history.go(-1);
            </script>
        ");
        exit;  // 스크립트 실행 중단
    }

    // POST로 전송된 제목과 내용 가져오기
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    // HTML 특수 문자를 변환하여 보안성 향상
    $subject = htmlspecialchars($subject, ENT_QUOTES);
    $content = htmlspecialchars($content, ENT_QUOTES);

    // 현재 시간을 '년-월-일 시:분' 형식으로 저장
    $regist_day = date("Y-m-d (H:i)");

    // 파일 업로드 관련 변수 설정
    $upload_dir = './data/';
    $upfile_name    = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_type    = $_FILES["upfile"]["type"];
    $upfile_size    = $_FILES["upfile"]["size"];
    $upfile_error   = $_FILES["upfile"]["error"];

    // 파일이 첨부된 경우 처리
    if ($upfile_name && !$upfile_error)
    {
        $file = explode(".", $upfile_name);  // 파일명을 . 기준으로 분리하여 확장자 추출
        $file_name = $file[0];
        $file_ext  = $file[1];

        $new_file_name = date("Y_m_d_H_i_s");  // 현재 시간을 이용한 새로운 파일명 생성
        $copied_file_name = $new_file_name . "." . $file_ext;  // 새로운 파일명에 확장자 추가
        $uploaded_file = $upload_dir . $copied_file_name;  // 파일 업로드될 경로와 파일명 설정

        // 파일 크기 제한 체크 (1MB 이상인 경우 경고창 띄우고 이전 페이지로 이동)
        if ($upfile_size > 1000000) {
            echo("
                <script>
                alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!');
                history.go(-1);
                </script>
            ");
            exit;
        }

        // 파일을 지정한 디렉토리로 이동하여 복사
        if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
            echo("
                <script>
                alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                history.go(-1);
                </script>
            ");
            exit;
        }
    }
    else {
        $upfile_name = "";  // 파일이 첨부되지 않은 경우 빈 문자열로 설정
        $upfile_type = "";
        $copied_file_name = "";
    }

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    // 게시글 정보를 free_board 테이블에 삽입하는 SQL 쿼리
    $sql = "insert into free_board (id, name, subject, content, regist_day, hit, file_name, file_type, file_copied) ";
    $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
    $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
    mysqli_query($con, $sql);  // 쿼리 실행하여 데이터베이스에 삽입

    // 회원 테이블에서 사용자의 포인트를 업데이트하는 SQL 쿼리
    $point_up = 100;  // 부여할 포인트
    $sql = "select point from members where id='$userid'";  // 사용자의 현재 포인트 가져오기
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $new_point = $row["point"] + $point_up;  // 새로운 포인트 계산

    $sql = "update members set point=$new_point where id='$userid'";  // 새로운 포인트로 업데이트
    mysqli_query($con, $sql);

    mysqli_close($con);  // 데이터베이스 연결 종료

    // 처리가 완료되면 목록 페이지로 이동
    echo "
       <script>
        location.href = 'free_board_list.php';
       </script>
    ";
?>
