<?php
    $id= $_POST['id'];
    $pass= $_POST['password'];
    $pass_confirm= $_POST['pass_confirm'];
    $name= $_POST['name'];
    $email1= $_POST['email1'];
    $email2= $_POST['email2'];
    $email= $email1 . "@" . $email2;
    $registday= date("Y-m-d H:i");



    if (!$id){
        echo("
        <script>
        alert('아이디를 입력해주세요.');
        history.back();
        </script>
        ");
        exit;
    }
    if (!$pass){
        echo("
        <script>
        alert('비밀번호를 입력해주세요.');
        history.back();
        </script>
        ");
        exit;
    }
    if (!$name){
        echo("
        <script>
        alert('이름을 입력해주세요.');
        history.back();
        </script>
        ");
        exit;
    }
    if (!$email1){
        echo("
        <script>
        alert('이메일을 입력해주세요.');
        history.back();
        </script>
        ");
        exit;
    }
    if (!$email2){
        echo("
        <script>
        alert('이메일을 입력해주세요.');
        history.back();
        </script>
        ");
        exit;
    }
    if ($pass!=$pass_confirm){
        echo("
        <script>
        alert('비밀번호를 확인해주세요.');
        history.back(); 
        </script>
        ");
    exit;    
    }

  $conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
  mysqli_query($conn,"set names utf8");
 

    $sql= "SELECT * FROM user WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    $rowNum= mysqli_num_rows($result);

    if($rowNum){
        echo("
            <script>
                alert('해당 아이디가 존재합니다.');
                history.back(); 
            </script>
        ");
        exit;
    }
    $sql= "SELECT * FROM user WHERE email='$email'";
    $result=mysqli_query($conn, $sql);
    $rowNum= mysqli_num_rows($result);
    if($rowNum){
        echo("
            <script>
                alert('해당 이메일이 존재합니다.');
                history.back(); 
            </script>
        ");
        exit;
    }
    
    $sql= "INSERT INTO user(id, password, name, email, registday) VALUES('$id','$pass','$name','$email','$registday')";
 
    mysqli_query($conn,$sql);
    mysqli_close($conn);

    echo "
        <script>
        window.location.href='  ./index.php';
        </script>
    ";
?>