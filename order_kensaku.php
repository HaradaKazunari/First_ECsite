<html>


<head>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="kai3.css" />
<meta charset="UTF-8">
<title> leather shop</title>
</head>



<body>
<?php
session_start();
$ban = $_POST['ban'];

$data=file("shohin lether.csv");
 $kensu=count($data);
 for($i=0; $i<$kensu; $i++){
	$data[$i] = rtrim($data[$i]);
	$data[$i] = explode(",",$data[$i]);
}
$sho=file("order_lether.csv");
 $ken=count($sho);
 for($i=0; $i<$ken; $i++){
	$sho[$i] = rtrim($sho[$i]);
	$sho[$i] = explode(",",$sho[$i]);
}
for($i=0;$i<$ken;$i++){
	if($ban == $sho[$i][1]){
		$namae = $sho[$i][0];
	}
}


print"<center><a href=\"shop_top.php\"><h1>leather goods</h1></a></center>\n";
echo '<div style="float:right">&emsp;</div>';
echo '<div style="float:right"><a href="cart.php"><img src="kago2.png"></a></div>';
print"<hr size=\"6\" >\n";
print"<p>\n";



echo '<div id="menu"; style="float:left;">';
echo '<ul>';
for($i=0; $i<$kensu; $i++){
	echo '<li><a href="shohin.php?no='.$data[$i][0].'">'.$data[$i][1].'</a></li>';
}echo '</ul></div>';



echo '<p><div style="padding:10px; margin-bottom:10px; color: #474747; background: whitesmoke; border-left: double 7px #4ec4d3;border-right: double 7px #4ec4d3;"></p>';
print"<center><font size=\"15\">注文履歴<br>".$namae."様&emsp;".$ban."&emsp;にお届け</font></center>\n";
print"<hr>\n";


$count = 0;
for($i=0; $i<$ken; $i++){
	if($sho[$i][1] == $ban){
		for($t=0;$t<4;$t++){
			echo '<div style="float:left;">&emsp;</div>';
		}
		$count = $count + 1;
		echo '<div style="float:left;"><br><font size="5">';
		echo date("Y/m/d",$sho[$i][5]);
		echo '<br>'.$sho[$i][3].'&emsp;'.$sho[$i][4].'個</font><br><img src="'.$sho[$i][2].'.jpg"></div>';
		if($count % 4 == 0){
			echo '<div style="clear:both";></div><br>';
			for($t=0;$t<10;$t++){
				echo '<div style="float:left;">&emsp;</div>';
			}
		}
	}
}

if($count % 4 != 0){
	echo '<div style="clear:both;"></div>';
}
print"<div style=\"clear:both;\"></div>\n";




?>
<hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>
</body>


</html>


