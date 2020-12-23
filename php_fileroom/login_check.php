<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');
	$namae = $_POST['namae'];
	$password = $_POST['password'];
	$db = new pdo("mysql:host=localhost;dbname=my_image","root","");
	$st = $db->prepare("SELECT * FROM aaaa WHERE table_name = ? and password = ?");
	$st->execute(array($namae, $password));
?>
	<body>
		<?php
			if ($st->rowCount() > 0) {
				$row = $st->fetch();
				$_SESSION['inamae'] = $namae;
				echo 'ログインしました';
			} else {
				echo 'ログイン失敗です';
			}
