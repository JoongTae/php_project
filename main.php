<!-- 메인 페이지의 중간 부분을 담당하는 코드 -->
<!-- 자유 게시판의 최근 게시물과 -->
<!-- 멤버들의 포인트 랭킹을 보여주는 코드-->

<style>
    #main_img_ba {
        background-color: black;
        height: 250px;
    }
    #imgg {
        width: 100%;
        height: 250px;
    }
.main-container {
        display : flex;
        align-tiems: center;  /* 요소물을 세로 중앙 정렬 */
}

    .video-container {
        margin-left: 1000px;  /*영상과 제목 사이 여백 */
    }
    .video-container iframe {
        width: 340px;   /* 영상 너비 설정 */
        height: 240px;  /* 영상 높이 설정 */
    }
</style>        
<div id="main_img_ba">
    <img id="imgg" src="./img/main_img.jpg">
</div>
<div id="main_content">
    <div class="main-container">
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/7maJOI3QMu0" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div id="latest">
        <h4>최근 게시글</h4>
        

        <ul>
            <!-- 최근 게시 글 DB에서 불러오기 -->
            <?php
                $con = mysqli_connect("localhost", "user1", "12345", "sample");
                $sql = "select * from free_board order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result) {
                    echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);
            ?>
                        <li>
                            <span><?=$row["subject"]?></span>
                            <span><?=$row["name"]?></span>
                            <span><?=$regist_day?></span>
                        </li>
            <?php
                    }
                }
                mysqli_close($con);
            ?>
        </ul>
    </div>
    <div id="point_rank">
        <h4>포인트 랭킹</h4>
        <ul>
            <!-- 포인트 랭킹 표시하기 -->
            <?php
                $con = mysqli_connect("localhost", "user1", "12345", "sample");
                $rank = 1;
                $sql = "select * from members order by point desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result) {
                    echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                        $name  = $row["name"];        
                        $id    = $row["id"];
                        $point = $row["point"];
                        $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
            ?>
                        <li>
                            <span><?=$rank?></span>
                            <span><?=$name?></span>
                            <span><?=$id?></span>
                            <span><?=$point?></span>
                        </li>
            <?php
                        $rank++;
                    }
                }

                mysqli_close($con);
            ?>
        </ul>
    </div>
</div>