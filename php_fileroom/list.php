<?php
require_once 'functions.php';

$pdo = connectDB();
session_start();
 
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得

} else {
    // 画像を保存
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        $sql = 'INSERT INTO '.$_SESSION["table_name"].'(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    unset($pdo);
    header('Location:list.php');
    exit();
}

unset($pdo);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Image Test</title>
</head>
<body>
    <div>
     <?php
        echo "room名";
        echo $_SESSION["table_name"];
        ?>
    </div>
<div class="container mt-5">
        <div class="col-md-4 pt-4 pl-4">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
            <form method="post">
            <div>
                <button type="button" onclick="location.href='login_a.php'">ホームに戻る</button>
               
                </div>
            </form>
        </div>
    </div>
</body>
</html>