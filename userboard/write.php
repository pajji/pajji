<?php

require_once('lib/top.php');
?>

<body>
    <div id="board_write">
        <h1><a href="/pajji/userboard/index.php">회원게시판</a></h1>
        <h4>글을 작성하는 공간입니다.</h4>
            <div id="write_area">
                <form action="write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <input type="hidden" name="name" id="uname" rows="1" cols="55" value="<?=$_SESSION['username']?>"><h2><?=$_SESSION['username']?></h2>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />
                    </div>
                    <div id="in_lock">
                        <input type="checkbox" value="1" name="lockpost" />해당글을 잠급니다.
                    </div>
                    <div id="in_file">
                        <input type="file" value="1" name="b_file" />
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
