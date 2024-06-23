<!-- 수신/송신 쪽지를 보여주는 페이지 -->

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>음악 공연 홍보 및 예약 웹사이트</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
</head>
<style>
#main_img_ba{
    background-color:black;
    height: 250px;
}
#imgg{
    width: 100%;
    height: 250px;
}
</style>

<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
    <div id="main_img_ba">
        <img id="imgg" src="./img/main_img.jpg">
    </div>
    <div id="message_box">
        <h3 class="title">
<?php
    // 모드와 번호 가져오기
    $mode = $_GET["mode"];
    $num  = $_GET["num"];

    // 데이터베이스 연결
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    // 메시지 조회 쿼리 실행
    $sql = "select * from message where num=$num";
    $result = mysqli_query($con, $sql);

    // 결과 레코드 가져오기
    $row = mysqli_fetch_array($result);
    $send_id    = $row["send_id"];
    $rv_id      = $row["rv_id"];
    $regist_day = $row["regist_day"];
    $subject    = $row["subject"];
    $content    = $row["content"];

    // 내용 공백 처리
    $content = str_replace(" ", "&nbsp;", $content);
    $content = str_replace("\n", "<br>", $content);

    // 모드에 따라 이름 가져오기
    if ($mode=="send")
        $result2 = mysqli_query($con, "select name from members where id='$rv_id'");
    else
        $result2 = mysqli_query($con, "select name from members where id='$send_id'");

    $record = mysqli_fetch_array($result2);
    $msg_name = $record["name"];

    // 제목 출력
    if ($mode=="send")         
        echo "송신 쪽지함 > 내용보기";
    else
        echo "수신 쪽지함 > 내용보기";
?>
        </h3>
        <ul id="view_content">
        <li>
            <span class="col1"><b>제목 :</b> <?=$subject?></span>
            <span class="col2"><?=$msg_name?> | <?=$regist_day?></span>
        </li>
        <li>
            <?=$content?>
        </li>       
        </ul>
        <ul class="buttons">
        <li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li>
        <li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
        <li><button onclick="location.href='message_response_form.php?num=<?=$num?>'">답변 쪽지</button></li>
        <li><button onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button></li>
            </ul>
    </div> <!-- message_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
