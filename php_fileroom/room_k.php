<form method=post action="">
<table>
    <tr><td>ルーム名<td><INPUT SIZE="50" TYPE="text" NAME="namae"></INPUT></tr> 
</table>

    <INPUT TYPE="submit" VALUE="検索" ></INPUT>

   
    
<?php
session_start();
$table_name = null;

$mysqli = new mysqli( 'localhost', 'root', '', 'my_image');
//$table_name = cba;
if( $mysqli->connect_errno ) {
	echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
}

$mysqli->set_charset('utf8');


extract($_POST);
   echo "検索したルーム名：".@$namae."<br>";
$table_name = @$namae;
$_SESSION["table_name"] = @$namae;
// テーブルを作成するSQLを作成
$sql = "SHOW TABLES FROM my_image WHERE Tables_in_".$table_name." LIKE '%%'";
// SQL実行
$res = $mysqli->query($sql);
    ?>
    
 
    <button type="button" onclick="location.href='list.php'">入室</button>