<?php
 
    $id= $_POST['id'];
    $pass= $_POST['password'];

    if(!$id){
        echo "
        <script>
            alert('아이디를 입력하세요.');
            history.back();
        </script>
        ";
         exit;
    }
    if(!$pass){
        echo "
        <script>
            alert('비밀번호를 입력하세요.');
            history.back();
        </script>
        ";
         exit;
    }

  $conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
  mysqli_query($conn,"set names utf8");

    $sql= "SELECT * FROM user WHERE id='$id' and password='$pass'";
    $result= mysqli_query($conn,$sql);
    $rowNum= mysqli_num_rows($result);

    if(!$rowNum){
        echo "
        <script>
            alert('아이디와 비밀번호를 확인하세요.');
            history.back();
        </script>
        ";
        exit;
    }
 
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
 
    session_start();
    $_SESSION['userid']=$row['id'];
    $_SESSION['username']=$row['name'];
    $_SESSION['userpass']=$row['password'];
    $_SESSION['useremail']=$row['email'];

    echo "
        <script>
        window.location = history.go(-2);
        </script>
    ";
 
?>