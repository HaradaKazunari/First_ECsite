<html>


<head>
<link rel="stylesheet" type="text/css" href="kai3.css" />
<meta charset="UTF-8">
<title></title>
</head>



<body>
<?php
session_start();
$_SESSION['sum'] = $_POST['soukin'];

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

print "<div style=\"padding:10px; margin-bottom:10px; color: #474747; background: whitesmoke; border-left: double 7px #4ec4d3;border-right: double 7px #4ec4d3;\">\n";
echo '<br><center><font size="8">お届け先を入力してください。</font><br><br>';
echo '<form method="post" action="order_kakunin.php">';
echo 'お名前:<input type="text" name="na">&emsp;';
echo 'ご住所:<input type="text" name="ban">';
echo '&emsp;<input type="submit" value="送信">';
echo '</form>';
echo '</center>';



?>
<br><br><hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>
</body>


</html>


