<!-- 화면에 출력되는 최상단에 해당하는 코드 -->

﻿<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"]; // 세션에 저장된 userid를 가져와 $userid 변수에 할당합니다.
    else $userid = ""; // 세션에 userid가 없으면 빈 문자열을 할당합니다.
    if (isset($_SESSION["username"])) $username = $_SESSION["username"]; // 세션에 저장된 username을 가져와 $username 변수에 할당합니다.
    else $username = ""; // 세션에 username이 없으면 빈 문자열을 할당합니다.
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"]; // 세션에 저장된 userlevel을 가져와 $userlevel 변수에 할당합니다.
    else $userlevel = ""; // 세션에 userlevel이 없으면 빈 문자열을 할당합니다.
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"]; // 세션에 저장된 userpoint를 가져와 $userpoint 변수에 할당합니다.
    else $userpoint = ""; // 세션에 userpoint가 없으면 빈 문자열을 할당합니다.
    
    // userlevel에 따라 등급 이름 설정
    if($userlevel == 1) $levelname = "관리자"; // userlevel이 1이면 $levelname을 "관리자"로 설정합니다.
    elseif($userlevel == 2) $levelname = "회원"; // userlevel이 2이면 $levelname을 "회원"으로 설정합니다.
    elseif($userlevel == 3) $levelname = "뮤지션"; // userlevel이 3이면 $levelname을 "뮤지션"으로 설정합니다.
?>		
        <div id="top">
            <h3>
                <a href="index.php">음악 공연 홍보 및 예약 웹사이트</a> <!-- 메인 페이지로 링크가 걸린 제목을 출력합니다. -->
            </h3>
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="member_form.php">회원 가입</a> </li> <!-- 로그인하지 않은 경우, 회원 가입 페이지로 링크가 걸린 메뉴를 출력합니다. -->
                <li> | </li> <!-- 구분선을 출력합니다. -->
                <li><a href="login_form.php">로그인</a></li> <!-- 로그인 페이지로 링크가 걸린 메뉴를 출력합니다. -->
<?php
    } else {
                $logged = $username."(".$userid.")님 [등급 : ".$levelname.", Point:".$userpoint."]"; // 로그인한 경우, 사용자 정보와 등급, 포인트를 표시하는 문자열을 생성합니다.
?>
                <li><?=$logged?> </li> <!-- 사용자 정보와 등급, 포인트를 출력합니다. -->
                <li> | </li> <!-- 구분선을 출력합니다. -->
                <li><a href="logout.php">로그아웃</a> </li> <!-- 로그아웃 페이지로 링크가 걸린 메뉴를 출력합니다. -->
                <li> | </li> <!-- 구분선을 출력합니다. -->
                <li><a href="member_modify_form.php">회원 정보 수정</a></li> <!-- 회원 정보 수정 페이지로 링크가 걸린 메뉴를 출력합니다. -->
                <li> | </li> <!-- 구분선을 출력합니다. -->
                <li><a href="member_profile.php">프로필</a></li> <!-- 프로필 페이지로 링크가 걸린 메뉴를 출력합니다. -->
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li> <!-- 구분선을 출력합니다. -->
                <li><a href="admin.php">관리자 모드</a></li> <!-- 관리자 모드 페이지로 링크가 걸린 메뉴를 출력합니다. -->
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">메인</a></li> <!-- 메인 페이지로 링크가 걸린 메뉴를 출력합니다. -->
                <li><a href="message_form.php">쪽지함</a></li> <!-- 쪽지함 페이지로 링크가 걸린 메뉴를 출력합니다. -->                               
                <li><a href="free_board_list.php">자유 게시판</a></li> <!-- 자유 게시판 페이지로 링크가 걸린 메뉴를 출력합니다. -->
                <li><a href="musician_board_list.php">뮤지션 게시판</a></li> <!-- 뮤지션 게시판 페이지로 링크가 걸린 메뉴를 출력합니다. -->
                <li><a href="notice_board_list.php">공연 공지 게시판</a></li> <!-- 공연 공지 게시판 페이지로 링크가 걸린 메뉴를 출력합니다. -->                
            </ul>
        </div>
