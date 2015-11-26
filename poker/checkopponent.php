<?php

$con = mysql_connect("localhost","root","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("pokerdb", $con);

$name = $_POST['name'];

$checkopp = mysql_query("SELECT * FROM game_table WHERE player1='$name'");

while($row = mysql_fetch_array($checkopp)) {
    $opp = $row['player2'];
    if($opp != "") {
        echo $opp;
    } else {
        echo "checkopponentfailed";
    }
}

mysql_close($con);
?>
