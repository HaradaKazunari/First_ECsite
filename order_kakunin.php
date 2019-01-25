<html>


<head>
<link rel="stylesheet" type="text/css" href="kai3.css" />
<meta charset="UTF-8">
<title></title>
</head>



<body>
<?php
session_start();
$bango=$_POST['ban'];
$namae=$_POST['na'];
$_SESSION['namae'] = $namae;
$_SESSION['bango'] = $bango;


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

echo '<div id="menu"; style="float:left;">';
echo '<ul>';
for($i=0; $i<$kensu; $i++){
	echo '<li><a href="shohin.php?no='.$data[$i][0].'">'.$data[$i][1].'</a></li>';
}echo '</ul></div>';


print "<div style=\"padding:10px; margin-bottom:10px; color: #474747; background: whitesmoke; border-left: double 7px #4ec4d3; border-right: double 7px #4ec4d3;\">\n";
echo '<font size="5"><center>お届け先 <br> お名前：'.$namae.'&ensp;様&emsp;&emsp;ご住所：'.$bango.'</center></font><br>';
echo '<hr><br><font size="5"><center>ご注文の商品&emsp;&emsp;合計：'.$_SESSION['sum'].'円';
echo '<form action="order_kiroku.php" method="POST">';
echo '<input type="submit" value="注文確定" style="width:100px; height:50px;">';
echo'</form></center></font>';

$ken=count($_SESSION['cart217']);
$count = 0;

for($i=0; $i<$ken; $i++){
	if($_SESSION['cart217'][$i][3] != 0){
		for($t=0;$t<4;$t++){
			echo '<div style="float:left;">&ensp;</div>';
		}
		$count = $count + 1;
		print "<div style=\"float:left;\"><p><img src=\"".$_SESSION['cart217'][$i][0].".jpg\"></p></div>\n";
		echo '<div style="float:left;"><p><font size="5">&ensp;'.$_SESSION['cart217'][$i][1].'<br>&ensp;購入数量：'.$_SESSION['cart217'][$i][3].'個<br>&ensp;&emsp;&emsp;単価：'.$_SESSION['cart217'][$i][2].'円<br>&ensp;&emsp;&emsp;金額：'.$_SESSION['cart217'][$i][4].'円</font></p>';
		echo '</font>';
		echo '</div>';	
		if($count%3 == 0){
			echo '<div style="clear:both;">';
			for($t=0;$t<10;$t++){
				echo '<div style="float:left;">&emsp;</div>';
			}
		}
	}
}
if($count % 3 != 0){
	echo '<div style="clear:both;"></div>';
}
echo '<div sytle="float:both"></div>';




?>
<hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>
</body>


</html>


