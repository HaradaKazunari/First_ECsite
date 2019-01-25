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

$kari = $_GET['no'];
if(isset($_POST['in'])){
	$kari = $_POST['bango'];
}
$henkan = intval($kari);

$data=file("shohin lether.csv");
 $kensu=count($data);
 for($i=0; $i<$kensu; $i++){
	$data[$i] = rtrim($data[$i]);
	$data[$i] = explode(",",$data[$i]);

}




for($i=0;$i<$kensu;$i++){
	if($henkan == $data[$i][0]){
		$no = $i;
		$shoban = $data[$no][0];
		$shomei = $data[$no][1];
		$tanka = $data[$no][2];
	}
}


print"<center><a href=\"shop_top.php\"><h1>leather goods</h1></a></center>\n";
echo '<div style="float:right">&emsp;&emsp;&emsp;;</div>';
echo '<div style="float:right"><a href="cart.php"><img src="kago2.png"></a></div>';
print"<hr size=\"6\" >\n";

echo '<div id="menu"; style="float:left;">';
echo '<ul>';
for($i=0; $i<$kensu; $i++){
	echo '<li><a href="shohin.php?no='.$data[$i][0].'">'.$data[$i][1].'</a></li>';
}echo '</ul></div><div style=\"clear:both;\"></div>';


print"<p><div style=\"padding:10px; margin-bottom:10px; color: #474747; background: whitesmoke; border-left: double 7px #4ec4d3;border-right: double 7px #4ec4d3;\"><center><font size=\"20\">".$data[$no][1]."</font></center></p>\n";
print"<div>&emsp;</div>";


print"<div style=\"float:left; \">";
for($i=0;$i<16;$i++){
	print"&emsp;";
}
print"</div>";
print"<div style=\"float:left;\"><img src=\"".$data[$no][0].".jpg\"></div>\n";
print"<div style=\"float:left; \">";
for($i=0;$i<1;$i++){
	print"&emsp;";
}
print"</div>\n";
print"<div style=\"float:left;\"><font size=\"6\" color=\"#8b4513\">".$data[$no][4]."</font><br><br>\n";
print"<center><font size=\"6\" color=\"#8b0000\">価格:".$data[$no][2]."円</font></center><br>\n";


if(isset($_POST['in'])){
	$kazu=$_POST['suu'];
	$ken = count($_SESSION['cart217']);
	$sw=0;	


	echo '<font size="6" color="#DC143C">&emsp;&emsp;※カートに追加しました。</font><br>';

	for($i=0; $i<$ken; $i++){
	     if($shoban==$_SESSION['cart217'][$i][0]){
        	  $_SESSION['cart217'][$i][3] = $_SESSION['cart217'][$i][3] + $kazu;
		  $_SESSION['cart217'][$i][4] = $tanka * $_SESSION['cart217'][$i][3];
	          $sw=1;
  	      }
	}
	if($sw==0 && empty($_SESSION['cart217'][$i][0])){
		$kin = $tanka * $kazu;
		$_SESSION['cart217'][$i][0] = $shoban;
		$_SESSION['cart217'][$i][1]  = $shomei;
		$_SESSION['cart217'][$i][2]  = $tanka;
		$_SESSION['cart217'][$i][3]  = $kazu;
		$_SESSION['cart217'][$i][4]  = $kin;
	}


}




print"<center><font size=\"8\"><form action=\"shohin.php\" method=\"POST\"><select name=\"suu\" >\n";
print"<option value=1 selected>1</option> <option value=2>2</option><option value=3>3</option> <option value=4>4</option><option value=5>5</option>";
for($i=0;$i<3;$i++){
	print"&emsp;";
}
print"<input type=\"hidden\" name=\"bango\" value=\"".$data[$no][0]."\">";
print"<input type=\"submit\" name=\"in\" value=\"カートに入れる\" style=\"width:150px;height:85px\">";
print"</form>";
print"</font>";
print"</center>";
print"<div>&emsp;";


print"</div><div style=\"clear:both;\">";
echo '<hr><center><font size="3"><a href="shop_top.php">トップに戻る</a></font></center></div>';
print"</div>\n";
print"<div style=\"clear:both;\"></div>\n";





?>
</body>


</html>


