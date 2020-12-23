<?php
session_start();
 

// セッションの値を初期化
$_SESSION = array();
 
// セッションを破棄
session_destroy();
?>
<meta http-equiv="refresh" content="0; url=room_k.php">
    