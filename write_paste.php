<html>
<head><meta http-equiv="refresh" content="0; URL=./pastebin.php"></head>
<body>
<?php
header("Access-Control-Allow-Origin: *");
$file = fopen('_', "w");
fwrite($file, $_POST['text']);
fclose($file);
?>
Write success!
</body>
</html>
