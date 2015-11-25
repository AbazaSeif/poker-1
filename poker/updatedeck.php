<?php
$name = $_POST['name'];
$con = mysql_connect("173.71.126.184:3306","alanrgan","penguins666");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("pokerdb", $con);
$deck = $_POST['deck'];
$name = $_POST['name'];
if($name != "") {
    if($deck != "") {
        mysql_query("UPDATE game_table SET deck='$deck' WHERE player2='$name' OR player1='$name'");
    } else {		echo "deck not set up";
    }
}
mysql_close($con);
?>