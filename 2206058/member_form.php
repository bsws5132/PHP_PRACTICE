<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href="./css/common.css">
    <link rel = "stylesheet" type = "text/css" href="./css/common.css">
    <title>member_form</title>
    <script>
        function check_id()
        {
            window.open('member_check_id.php?id=' + document.member_form.id.value, 'idCheck','left = 700 , top = 300 , width = 350 , height = 200 scrollbars=no, resizable = yes' );
        }

        window.call = function(data)
        {
            console.log('자식창에서 호출', data);
            var msg= '자식창에서 입력한 값 : \n' + data;
            document.getElementById('inputPre').value = msg;
        }

        function check_input()
        {
            if(!document.member_form.id.value)
            {
                alert("아이디를 입력해주세요");
                return;
            }

            if(document.member_form.id.value && !document.member_form.inputPre.value)
            {
                alert('중복체크해주세요');
                return;
            }

            if(!document.member_form.pass.value)
            {
                alert("비밀번호를 입력해주세요");
                document.member_form.pass.focus();
                return;

                if(!document.member_form.pass_confirm.value)
                {
                    alert("비밀번호를 확인해주세요");
                document.member_form.pass.focus();
                return;
                }

                if(document.member_form.pass_confirm.value!= document.member_form.pass_confirm.value)
                {
                    alert("비밀번호를 확인해주세요, 일치하지 않습니다.");
                    document.member_form.pass.focus();
                    document.member_form.pass.select();
                    return;
                }

                if(document.member_form.inputPre.value >=1)
                {
                    alert("중복된 아이디입니다. 다시 입력해주세요.");
                    document.member_form.form.id.focus();
                }

                
            }

            document.member_form.submit();
        }

        function reset_form()
        {
            document.member_form.id.value = '';
            document.member_form.pass.value = '';
            document.member_form.inputPre.value = '';
            document.member_form.pass_confirm.value = '';
            document.member_form.id.focus();

            return;
        }
    </script>
</head>
<body>
    <header><?php include "header.php"?></header>
    <section>
        <div id = "main_img_bar">
            <img src = "./img/main_img.png">
        </div>
        <div id ="main_conten">
            <div id = "join_box">
            <form name = "member_form" method ="post" action="member_insert.php">
                <h2>회원가입</h2>
                
                
            <div class = "form id">
                <div class = "col1"> 아이디</div>
                <div class = "col2"> <input type = "text" name = "id"></div>
                <div class = "col3"> <a href = "#"> <img src = "./img/check_id.gif" onclick = "check_id()"></a></div>
            </div>

            <!--부모에게 받은 값 넣기-->
            <input id = "inputPre" type = "hidden" value = "">
            <div class = "clear"> </div>

            <div class = "form">
                <div class = "col1"> 비밀번호</div>
                <div class = "col2"> <input type = "password" name = "pass"></div>
                
            </div>
            <div class = "clear"> </div>

            <div class = "form id">
                <div class = "col1"> 비밀번호 확인</div>
                <div class = "col2"> <input type = "password" name = "pass_confirm"></div>
                
            </div>
            <div class = "clear"> </div>

            <div class = "bottom_line"></div>
            <div class = "button"> 
                <img style = "cursor:pointer;" src="./img/button_save.gif" onclick = "check_input()">&nbsp
                <img id = "reset_button" style = "cursor:pointer" src="./img/button_reset.gif" onclick = "reset_form()">
            </div>


            </form>
            </div>
        </div>
    </section>
</body>
</html>