<!DOCTYPE HTML>
<html>
    <head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width" />
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="./radio.css">
    <!--<link type="text/css" rel="stylesheet" href="./star.css">-->
    <link type="text/css" rel="stylesheet" href="./test1.css">
    <link type="text/css" rel="stylesheet" href="./ttt.css">
    <link type="text/css" rel="stylesheet" href="./footer.css">
    </head>
    <?php 

session_start();

$userid="";
$username="";


if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
if( isset($_SESSION['username'])) $username= $_SESSION['username'];


?>
<header>
<?php include "./header.php" ?>
</header>


    <h1 class="other">rest1</h1>
    <?php
$conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
$sql = "SELECT round(avg(별),2) FROM star";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo '<a href="./map.php#rest1" style="text-decoration: none; color: black;" class="other"><img src="./img/map.png"></a><br>';
echo "<span class='other'> 평점 : </span>" . $row['round(avg(별),2)'];


?>
    <body>
    <!--<form action="./star_insert.php" method="post" name="star">
      <div class="rest"><input type="text" name="restaurant" value="rest1"></div>
    <div class="startRadio">
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="0.5">
      <span class="startRadio__img"><span class="blind">별 1개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="1">
      <span class="startRadio__img"><span class="blind">별 1.5개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="1.5">
      <span class="startRadio__img"><span class="blind">별 2개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="2">
      <span class="startRadio__img"><span class="blind">별 2.5개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="2.5">
      <span class="startRadio__img"><span class="blind">별 3개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="3">
      <span class="startRadio__img"><span class="blind">별 3.5개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="3.5">
      <span class="startRadio__img"><span class="blind">별 4개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="4">
      <span class="startRadio__img"><span class="blind">별 4.5개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="4.5">
      <span class="startRadio__img"><span class="blind">별 5개</span></span>
   </label>
   <label class="startRadio__box">
      <input type="radio" name="star" id="" value="5">
      <span class="startRadio__img"><span class="blind">별 5.5개</span></span>
   </label>
  <input type = 'submit' name ='btn' value='별점주기' style="margin-top: 30px" class="abc">
</div>
</form>-->
<form name="myform" id="myform" method="post" action="./star_insert.php">
    <fieldset class="other">
    <input type="text" name="restaurant" value="rest1" style="display: none;">
        <input type="radio" name="star" value="5" id="rate1"><label for="rate1">⭐</label>
        <input type="radio" name="star" value="4" id="rate2"><label for="rate2">⭐</label>
        <input type="radio" name="star" value="3" id="rate3"><label for="rate3">⭐</label>
        <input type="radio" name="star" value="2" id="rate4"><label for="rate4">⭐</label>
        <input type="radio" name="star" value="1" id="rate5"><label for="rate5">⭐</label>
    </fieldset>
    <br><input type='submit' name='btn' value='별점주기' class="other" style="margin-top: 10px;">
</form>


    </body>
    <!--<script>
    $(document).ready(function(){
        $('.ee').hide();
        $('#ww').click(function(){
            $('#qq').toggle(400);
        });
        
    });
</script>-->
<?php
   // 데이터베이스 접속도 공통 모듈에 작성해서 사용
   $conn= mysqli_connect('test.crwx1himfqyb.ap-northeast-2.rds.amazonaws.com:3306','admin','shekdms8260','test');
   // 한글깨짐 방지 쿼리 실행
   mysqli_query($conn,"set names utf8");
   $sql = "select menu.restaurant, menu.menu, menu.price, menu.image, sum(recommend) from menu left join rec on menu.menu=rec.menu where menu.restaurant='rest1' group by menu.menu order by sum(recommend) desc";
   $result = mysqli_query($conn, $sql);

   echo "<style>tr { position: relative;} </style>";
   echo "<style>th { width: 150px; padding: 10px; font-weight: bold; vertical-align: top; border-bottom: 1px solid #ccc; }</style>";
   echo "<style>td { width: 150px; padding: 10px; text-align: center; vertical-align: top; border-bottom: 1px solid #ccc;}</style>";
   echo "<style> .abc { position: absolute; bottom:0;}</style>";
   echo "<table><tbody>";
   echo "<style>img { width: 50px; height: 50px;} </style>";
   echo "<style>input[type='text'] {width: 100px;} </style>";
   //echo "<style> .ee {display: none;}</style>";
   //echo "<style> span:hover + table.ee {display: inline-block;}</style>";
  

   echo '<span id="ww"><img src="./img/2Q.png"></span>';
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     echo "<table id='qq' class='ee'><tr>";
     echo '<th>'. $row['menu']. '<br>'. '<img src="'.$row['image'].'" >'. '</th>';
     echo '<td class=abc>' . $row['price'] . '원<br>
     <form name="rec" id="rec" method="post" action="./rec_insert.php"><input type=text name="restaurant" value="rest1" style="display: none;">
     <input type=text name="menu", value="'. $row['menu'] .'" style="display: none;"><input type=text name="rec" value=1 style="display: none;">
     <label><input type=submit value=추천 style="display: none;"><i class="fa-solid fa-thumbs-up" style="border: 2px solid #2199e8; padding: 3px; color: #2199e8; border-radius: 5px;";>&nbsp;'
      . $row['sum(recommend)'] .'</i></label></form>' .  '</td>';
     echo "</tr></table>";
   }
   }else{
   echo "메뉴 정보가 없습니다.";
   }
   mysqli_close($conn);
   
?>

<div style="margin-bottom: 70px; position: relative; top: 0;"></div>

<?php include "./footer.php" ?>
</html>