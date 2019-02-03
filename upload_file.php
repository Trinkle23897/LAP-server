<html>
<head>
<meta http-equiv="refresh" content="2; URL=/files.php">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/bootstrap-theme.min.css">
<script src="style/jquery.min.js"></script>
<script src="style/bootstrap.min.js"></script>
</head>
<body>
<?php
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
        echo "文件名：" . $_FILES["file"]["name"] . "<br />";
        echo "文件类型：" . $_FILES["file"]["type"] . "<br />";
        echo "文件大小：" . number_format($_FILES["file"]["size"] / 1024 / 1024, 2) . " M<br />";
        // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        if (file_exists("upload/" . $_FILES["file"]["name"]) || strpos(strtolower($_FILES["file"]["name"]), "php")) {
            echo $_FILES["file"]["name"] . " 已经存在，2秒后返回";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "upload/" . $_FILES["file"]["name"]);
            // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            echo "上传成功！2秒后返回";
        }
    }
?>
</body>
</html>
