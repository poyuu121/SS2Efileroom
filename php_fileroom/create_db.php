<?php
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('接続できません: ' . mysql_error());
}

$sql = 'CREATE DATABASE fileroom_db';
if (mysql_query($sql, $link)) {
    echo "データベース fileroom_db の作成に成功しました\n";
} else {
    echo 'データベースの作成に失敗しました: ' . mysql_error() . "\n";
}
?>