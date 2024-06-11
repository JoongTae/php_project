﻿<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
        <div id="top">
            <h3>
                <a href="index.php">음악 공연 홍보 및 예약 웹사이트</a>
            </h3>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
                <li> | </li>
                <li><a href="member_profile.php">프로필</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">HOME</a></li>
                <li><a href="message_form.php">쪽지 기능</a></li>                                
                <li><a href="free_board.php">자유 게시판</a></li>
                <li><a href="board_form.php">공연 공지 게시판</a></li>
                <li><a href="musician_board.php">뮤지션 게시판</a></li>                
            </ul>
        </div>


<!--
        <li><a href="index.php">HOME</a></li>
        <li><a href="message_form.php">쪽지 만들기(13장)</a></li>                                
        <li><a href="board_form.php">게시판 만들기(14장)</a></li>
        <li><a href="index.php">사이트 완성하기(15장)</a></li>
-->