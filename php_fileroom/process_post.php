<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>pass</title>
</head>
<body>
<?php
session_start();
    echo $_SESSION["table_name"];
$con = mysql_connect('localhost', 'root', '');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('my_image', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$name = $_SESSION["table_name"];
$pass = $_REQUEST['pass'];


$result = mysql_query("INSERT INTO ".$_SESSION["table_name"]."(table_name, password) VALUES('$name', '$pass')", $con);
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="list.php">roomに入る</a></p>
</body>
</html>