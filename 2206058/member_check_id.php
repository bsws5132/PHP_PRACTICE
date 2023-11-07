<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>duplicate check</title>
    <style>
        h3
        {
            padding-left: 5px;
            border-left: solid 5px #edbf07;
        }
        #close
        {
            margin : 20px 0 0 80px;
            cursor : pointer;
        }
    </style>
    <script> 
        function callParent()
        {
            var msg = document.getElementById('sendMsg').value;
            if(msg == '')
            {
                alert('input창에 텍스트를 입력해주세요.');
                return;
            }
            opener.call(msg);
            window.close();
        }
    </script>
</head>
<body>
    <h3>아이디 중복체크</h3>
    <p>
        <?php
            $id = $_GET['id'];
            if(!$id)
            {
                echo('<li> 아이디를 입력해주세요</li>');
            }
            else
            {
                $con = mysqli_connect('localhost', 'user1','genie', 'sample');
                $sql = "select * from members where id = '$id'";
                $result = mysqli_query($con,$sql);
                $num_record = mysqli_num_rows($result);

                if($num_record)
                {
                    echo "<li>".$id." 아이디는 중복입니다</li>";
                    echo "<li> 다른 아이디를 사용해주세요</li>";
                }
                else
                {
                    echo "<li>".$id."는 사용가능한 아이디입니다.</li>";
                }
                mysqli_close($con);
            }
        ?>
    </p>
    <input type = "hidden" id = "sendMsg" value = " <?=$num_record?>">
    <button class = "btn btn-primary" onclick ="callParent()" > 창닫기</button>
    
</body>
</html>