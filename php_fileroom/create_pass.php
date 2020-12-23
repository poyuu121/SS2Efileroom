<?php
require_once 'functions.php';

$pdo = connectDB();
session_start();
  
$_SESSION["table_name"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>password設定</title>
</head>
<body>

  <form method="post" action="process_post.php">
      
    roomname : 
        
        <?php
        echo $_SESSION["table_name"];
        ?>
        
     
    password : <input type="password" name="pass" size="30">
   <input type="submit" name="submit" value="登録" class="button">
  </form>

</body>
</html>