<form method=post action="">
<table>
    <tr><td>ルーム作成画面<td><INPUT SIZE="50" TYPE="text" NAME="namae"></INPUT></tr> 
</table>

    <INPUT TYPE="submit" VALUE="作成" ></INPUT>

   
    
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
   echo "作成したルーム名：".@$namae."<br>";
$table_name = @$namae;
$_SESSION["table_name"] = @$namae;
// テーブルを作成するSQLを作成
$sql = "CREATE TABLE ".$table_name." (
	image_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	image_name VARCHAR(256),
	image_type VARCHAR(64),
	image_content MEDIUMBLOB,
	image_size INT(11),
	created_at DATETIME,
    table_name VARCHAR(30),
    password VARCHAR(30)
) engine=innodb default charset=utf8";
// SQL実行
$res = $mysqli->query($sql);
    ?>
    
 
    <button type="button" onclick="location.href='create_pass.php'">password作成</button>