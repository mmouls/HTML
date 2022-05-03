<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
        <meta charset="UTF-8">
    </head>
<?php
$conn= mysqli_connect('192.168.123.7:3306','root','shekdms8260','test');
$sql = "SELECT * from menu where restaurant='rest1' order by rand() limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo "<h1>추천메뉴</h1>";
echo $row['menu'];
echo "<br>[" . $row['restaurant'] . "]<br>";
echo "<a href='./" . $row['restaurant'] .".php'>음식점 이동</a>";

?>

</html>