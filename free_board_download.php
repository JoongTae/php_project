    <!-- 자유 게시판에서 '저장'버튼을 누르면 게시판에 첨부되어 있던 이미지 파일을 다운로드 할 수 있도록 하는 페이지 -->

<?php
    $real_name = $_GET["real_name"];  // 실제 파일 경로에서 가져온 파일명
    $file_name = $_GET["file_name"];  // 다운로드될 파일의 이름
    $file_type = $_GET["file_type"];  // 파일의 MIME 타입
    $file_path = "./data/".$real_name;  // 서버에서 파일의 실제 경로

    $ie = preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) || 
        (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0') !== false && 
            strpos($_SERVER['HTTP_USER_AGENT'], 'rv:11.0') !== false);

    // IE 브라우저에서 한글 파일명이 깨지는 문제를 해결하기 위한 코드
    if( $ie ){
         $file_name = iconv('utf-8', 'euc-kr', $file_name);
    }

    if( file_exists($file_path) )
    { 
		$fp = fopen($file_path,"rb");  // 파일을 읽기 모드로 열기
		Header("Content-type: application/x-msdownload");  // 다운로드할 파일의 MIME 타입 설정
        Header("Content-Length: ".filesize($file_path));  // 다운로드할 파일의 크기 설정     
        Header("Content-Disposition: attachment; filename=".$file_name);  // 다운로드 시 파일명 설정   
        Header("Content-Transfer-Encoding: binary");  // 전송 인코딩 설정
		Header("Content-Description: File Transfer");  // 파일 전송 설명
        Header("Expires: 0");  // 캐시 제어

        // 파일 내용을 출력
        if (!fpassthru($fp)) {
            fclose($fp); // 파일 닫기
        }
    } else {
        echo "해당 파일을 찾을 수 없습니다.";
    }
?>
