<?php

    session_start();

    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    unset($_SESSION['userpass']);
    unset($_SESSION['useremail']);

    
    echo "
    <script>
    alert ('로그아웃되었습니다.');
    window.location = document.referrer;
    </script>
    ";

?>