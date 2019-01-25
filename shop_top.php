<html>


<head>
<link rel="stylesheet" type="text/css" href="kai.css" />
<meta charset="UTF-8">
<title></title>
</head>



<body>
<?php

$data=file("shohin lether.csv");
 $kensu=count($data);
 for($i=0; $i<$kensu; $i++){
	$data[$i] = rtrim($data[$i]);
	$data[$i] = explode(",",$data[$i]);

}


print"<center><a href=\"shop_top.php\"><h1>leather goods</h1></a></center>\n";
print"<hr size=\"6\" >\n";
print "<div style=\"padding:10px; margin-bottom:10px; color: #474747; background: whitesmoke; border-left: double 7px #4ec4d3;border-right: double 7px #4ec4d3;\">";
echo '<div style ="float:left"><font size="3"><center><a href="input_rireki_kensaku.php">&emsp;&emsp;注文履歴確認<br><img src="rireki1.jpg"></a></center></font></div>';
echo '<div style="float:right">&emsp;</div>';
echo '<div style="float:right"><a href="cart.php"><img src="kago1.png"></a></div>';
echo '<div style="clear:both;"></div>';
print"<p>\n";
$count = 1;
$t = 0;
$hyouzi = 3;
for($i=0; $i<$kensu; $i++){

	
		
	for($y=0;$y<18;$y++){
		print"&emsp;";
	}
	if($i == 2)  print"&emsp;&emsp;&emsp;";
	if($i == 4)  print"&emsp;&emsp;&emsp;&emsp;";
	if($i == 5)  print"&emsp;&emsp;&emsp;";
	$soeji[$i] = $i;
	print"<font size=\"5\"><a href=\"shohin.php?no=".$data[$i][0]."\">".$data[$i][1]."</a></font>\n";
		if($count % $hyouzi == 0){
			print"<br>";
			for($j=$t; $j<=$i;$j++){
				for($y=0;$y<15;$y++){
					print"&emsp;";
				}
				print"<a href=\"shohin.php?no=".$data[$j][0]."\"><img src=\"".$data[$j][0].".jpg\"></a>\n";
				}$t = $i+1;

			print"</p>\n<p>\n";
		}
	$count = $count + 1;
	
}
print"<br>";
for($y=0;$y<15;$y++){
	print"&emsp;";
}
if($kensu % $hyouzi != 0)
	print"<a href=\"shohin.php?no=".$data[$kensu-1][0]."\">><img src=\"".$data[$kensu-1][0].".jpg\"></a>\n";


print"</p>\n";

?>
<hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>

</body>


</html>


