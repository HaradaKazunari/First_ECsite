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
$sum = 0;

$data=file("shohin lether.csv");
 $kensu=count($data);
 for($i=0; $i<$kensu; $i++){
	$data[$i] = rtrim($data[$i]);
	$data[$i] = explode(",",$data[$i]);
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



$ken = count($_SESSION['cart217']);


for($i=0;$i<$ken;$i++){
	if(isset($_POST['sakujo']) && $_POST['bango'] == $i){
		$key = $_POST['bango'];
		$_SESSION['cart217'][$i][3] = 0;
		$_SESSION['cart217'][$i][4] = 0;
	}
	$sum = $sum + $_SESSION['cart217'][$i][4];
	
}

if(isset($_POST['sakujo'])){



}


echo '<p><div style="padding:10px; margin-bottom:10px; color: #474747; background: whitesmoke; border-left: double 7px #4ec4d3;border-right: double 7px #4ec4d3;"></p>';
print"<center><font size=\"15\">カート</font><br>\n";
if(count($_SESSION['cart217']) != 0){
	print "<font size=\"8\">支払総額：".$sum."円\n";
	echo '<form action="input_jusho.php" method="POST">';
	echo '<input type="submit"  value="購入" style="width:100px;height:50px">';
	echo '<input type="hidden" name="soukin" value="'.$sum.'" >';
	echo '</form></font>';
}
echo '</center>';
print"<hr size=\"6\" >\n";

if(isset($_POST['sakujo'])){
	$x = $_POST['bango'];
	$count = 0;


	for($i=0; $i<$ken; $i++){
		

		for($t=0;$t<3;$t++){
			echo '<div style="float:left;">&ensp;</div>';
		}
		if($x == $i){
			echo'<div style="float:left;">';
			echo'<center>&emsp;&emsp;カートから削除しました。&emsp;&emsp;</center>';
			echo'</div>';
			$count = $count + 1;
		}
		else{
			if($_SESSION['cart217'][$i][3] == 0){

			}
			else{
				print "<div style=\"float:left;\"><p><img src=\"".$_SESSION['cart217'][$i][0].".jpg\"></p></div>\n";
				echo '<div style="float:left;"><p><font size="5">&ensp;'.$_SESSION['cart217'][$i][1].'<br>&ensp;購入数量：'.$_SESSION['cart217'][$i][3].'個<br>&ensp;&emsp;&emsp;単価：'.$_SESSION['cart217'][$i][2].'円<br>&ensp;&emsp;&emsp;金額：'.$_SESSION['cart217'][$i][4].'円</font></p>';
				echo '<font size="5"><form action="cart.php" method="POST">';
				echo '<input type="hidden" name="bango" value="'.$i.'">';
				echo '<input type="hidden" name="kin" value="'.$_SESSION['cart217'][$i][4].'">';
				echo '&emsp;&emsp;<input type="submit" name="sakujo" value="削除する" style="width:100px;height:50px">';
				echo '</form></font>';
				echo '</div>';
				$count = $count + 1;
			}
		}
		if($count%3 == 0){
			echo '<div style="clear:both;"></div>';
			for($t=0;$t<10;$t++){
				echo '<div style="float:left;">&emsp;</div>';
			}
		}

	}

}
else{
	$count = 0;

	for($i=0; $i<$ken; $i++){
		for($t=0;$t<3;$t++){
			echo '<div style="float:left;">&ensp;</div>';
		}
		
		if($_SESSION['cart217'][$i][3] == 0){

		}
		else{
			print "<div style=\"float:left;\"><p><img src=\"".$_SESSION['cart217'][$i][0].".jpg\"></p></div>\n";
			echo '<div style="float:left;"><p><font size="5">&ensp;'.$_SESSION['cart217'][$i][1].'<br>&ensp;購入数量：'.$_SESSION['cart217'][$i][3].'個<br>&ensp;&emsp;&emsp;単価：'.$_SESSION['cart217'][$i][2].'円<br>&ensp;&emsp;&emsp;金額：'.$_SESSION['cart217'][$i][4].'円</font></p>';
			echo '<form action="cart.php" method="POST">';
			echo '<input type="hidden" name="bango" value="'.$i.'">';
			echo '<input type="hidden" name="kin" value="'.$_SESSION['cart217'][$i][4].'">';
			echo '&emsp;&emsp;<input type="submit" name="sakujo" value="削除する" style="width:100px;height:50px">';
			echo '</form></font>';
			echo '</div>';
			$count = $count + 1;
		}
		
		if($count%3 == 0){
			echo '<div style="clear:both;"></div>';
			for($t=0;$t<10;$t++){
				echo '<div style="float:left;">&emsp;</div>';
			}
		}

	}

}
if($ken == 0){
	echo '<center><br><br><font size="5">カートには何もありません。</font><br><br></center>';
}
if($count % 3 != 0){
	echo '<div style="clear:both;"></div>';
}
echo '<hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>';
print"<div style=\"clear:both;\"></div>\n";




?>

</body>


</html>


