<?php

ini_set('display_errors', 1);

$con = mysql_connect("173.71.126.184:3306","root", "password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("pokerdb", $con);

$deck = $_POST['deck'];
$hand = $_POST['hand'];
$name = $_POST['name'];
$pnum = $_POST['playernum'];

if($pnum == 1)
{
	$pmoneystring = "player1_money";
	$phandstring = "player1hand";
	$pstring = "player1";
}
else
{
	$pmoneystring = "player2_money";
	$phandstring = "player2hand";
	$pstring = "player2";
}

mysql_query("UPDATE game_table SET deck='$deck', $phandstring='$hand', turn='1',
			$pmoneystring='4950', pot='50', stage='betting' WHERE $pstring='$name'") or die(mysql_error());
if($name == "") {
    echo "hsdgs";
} else {
    echo "success";
}

mysql_close($con);
?>
