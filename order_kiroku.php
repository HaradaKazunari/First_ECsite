<html>
<head>
<link rel="stylesheet" type="text/css" href="kai3.css" />
<meta charset="UTF-8">
<title>注文データの記録</title>
</head>

<body>
<?php
session_start();



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

echo '<font size="5"><center>注文を受け付けています。</center></font>';
echo '<font size="5"><center><br> お名前：'.$_SESSION['namae'].'&ensp;様&emsp;&emsp;ご住所：'.$_SESSION['bango'].'</center></font><br>';
echo '<hr><br><font size="5"><center>ご注文の商品&emsp;&emsp;合計：'.$_SESSION['sum'].'円<br><font color="#DC143C">注文が完了しました。<br>注文履歴はサイトのトップページからご確認ください。</font></center></font>';



$ken=count($_SESSION['cart217']);
$count = 0;

 for($i=0; $i<$ken; $i++){
	if($_SESSION['cart217'][$i][3] != 0){
		for($t=0;$t<3;$t++){
			echo '<div style="float:left;">&ensp;</div>';
		}
		$count = $count + 1;
		print "<div style=\"float:left;\"><p><img src=\"".$_SESSION['cart217'][$i][0].".jpg\"></p></div>\n";
		echo '<div style="float:left;"><p><font size="5">&ensp;'.$_SESSION['cart217'][$i][1].'<br>&ensp;購入数量：'.$_SESSION['cart217'][$i][3].'個<br>&ensp;&emsp;&emsp;単価：'.$_SESSION['cart217'][$i][2].'円<br>&ensp;&emsp;&emsp;金額：'.$_SESSION['cart217'][$i][4].'円</font></p>';
		echo '</font>';
		echo '</div>';
		if($count % 3 == 0){
			echo '<div style="clear:both;"></div>';
			for($t=0;$t<10;$t++){
				echo '<div style="float:left;">&emsp;</div>';
			}
		}
	}
 }
if($count % 3 != 0){
	echo '<div style="clear:both;"></div>';
}
echo '<div style="clear:both;"></div>';



 $fp=fopen("order_lether.csv","a");

 for($i=0; $i<$ken; $i++){
	if($_SESSION['cart217'][$i][3] != 0){
		$day = time();
		fputs($fp,$_SESSION['namae'].",".$_SESSION['bango'].",".$_SESSION['cart217'][$i][0].",".$_SESSION['cart217'][$i][1].",".$_SESSION['cart217'][$i][3].",".$day."\n");
	}
}
 fclose($fp);


  $fp=fopen("shohin lether.csv","w");
  for($i=0;$i<$kensu;$i++){
    $sw=0;
    for($t=0;$t<$ken;$t++){
      if($_SESSION['cart217'][$t][0] == $data[$i][0]){
        $sw=1;
        $suu = $data[$i][3] - $_SESSION['cart217'][$t][3];
        fputs($fp,$data[$i][0].",".$data[$i][1].",".$data[$i][2].",".$suu.",".$data[$i][4]."\n");
        break;
      }
    }
    if($sw==0){
      fputs($fp,$data[$i][0].",".$data[$i][1].",".$data[$i][2].",".$data[$i][3].",".$data[$i][4]."\n");
    }
  }
  fclose($fp);

 session_destroy();

?>

<br>
<hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>
<br>

</body>
</html>
