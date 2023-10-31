<?php

    //session check
    session_start();
    if(isset($_SESSION['userid']))
    {
        $userid = $_SESSION['userid'];
    }
    else
    {
        $userid = "";
    }

    if(isset($_SESSION['userlevel']))
    {
        $userlevel = $_SESSION['userlevel'];
    }
    else
    {
        $userlevel = "";
    }

    if(isset($_SESSION['userpoint']))
    {
        $userpoint =  $_SESSION['userpoint'];

    }
    else
    {
        $userpoint = "";
    }

?>

<div id = "top">
    <h3>
        <a href = "index.php">프로그래밍 입문</a>
    </h3>
    <ul id = "top_menu">
        <?php
            if(!$userid){
        ?>
                <li><a href = "member_form.php">회원가입</a></li>
                <li><a href = "login_form.php">로그인</a></li>
        <?php
            }else {
                $logged = "(" .$userid.")님 [level:".$userlevel.", Point:".$userpoint."";
            }
        ?>

        <li><?php $logged ?> </li>
        <li> | </li>
        <li> <a href = "logout.php">로그아웃</a> </li>
        
    </ul>
</div>
<input type = "hidden" name = "name" id = "userid" value= " <?=$userid?>" />
<div id = "menu_bar">
    <ul>
        <li><a href = "index.php">Home </a></li>
        <li> <a href= "#" id = "board" onclick = "checkAuth('userid','login_form.php', 'board_form_php')" 게시판 만들기 > </a> </li>
        <li><a href="index.php">사이트 완성</a></li>
    </ul>
<div>


<script type = "text/javascript">
    const chcekAuth = (target, back, move) =>
    {
        const id = document.querySelector('#${target}');
        console.log('borad 연결,아이디 세션' , id.value);
        if(!id.value)
        {
            alert('게시판 글쓰기는 로그인 후 이용바랍니다');
            return;
        }
        location.href = '${move}';
    }
</script>