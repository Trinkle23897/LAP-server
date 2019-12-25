<?php
header("Access-Control-Allow-Origin: *");
$dir = $_GET["dir"];
if($dir == '' || strpos($dir, "..") > -1 || $dir[0] == '/') $dir = './files';
if($dir[-1] != '/') $dir = $dir.'/';
function get_all_files($dir) {
	$arr = array();
	$src = opendir($dir);
	while ($val = readdir($src)) {
		if ($val[0] == '.' || $val[0] == '_') continue;
		array_push($arr, $val);
	}
	sort($arr);
	return $arr;
}
 ?>
<html>
<head>
	<title>Shared Files</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/bootstrap-theme.min.css">
	<script src="style/jquery.min.js"></script>
	<script src="style/bootstrap.min.js"></script>
</head>
<style type="text/css">
.a-upload {
    padding: 0px 10px;
    height: 30px;
    line-height: 30px;
    position: relative;
    cursor: pointer;
    color: #888;
    background: #fafafa;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    display: inline-block;
    *display: inline;
    *zoom: 1}
.a-upload  input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
    filter: alpha(opacity=0);
    cursor: pointer}
.a-upload:hover {
    color: #444;
    background: #eee;
    border-color: #ccc;
    text-decoration: none
}
.file {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<h1 class="text-center" id="title">
					一个辣鸡文件服务器
				</h1>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th width="25%"></th>
							<th width="15%">编号</th>
							<th>文件</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$cnt = 0;
						$arr=get_all_files($dir);
						foreach ($arr as $name){
							++$cnt;
							echo "<tr>";
							echo "<td></td>";
							echo "<td>$cnt</td>";
							if(is_dir($dir.$name))
								echo "<td><a href=\"./files.php?dir=$dir$name\">$name</a></td>";
							else
								echo "<td><a href=\"$dir$name\">$name</a></td>";
							echo "</tr>";
						}
						if($dir=='./files/'){
							$dir='./upload/';
							$arr=get_all_files($dir);
							foreach ($arr as $name){
								++$cnt;
								echo "<tr>";
								echo "<td></td>";
								echo "<td>$cnt</td>";
								if(is_dir($dir.$name))
									echo "<td><a href=\"./files.php?dir=$dir$name\">$name</a></td>";
								else
									echo "<td><a href=\"$dir$name\">$name</a></td>";
								echo "</tr>";
							}
						}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<form action="upload_file.php" method="post" enctype="multipart/form-data">
		<center>
		<table>
		<td>
		<input type="file" name="file" id="file" class="btn btn-default"/>
		</td><td width="30"></td><td>
		<input type="submit" name="submit" value="上传文件" class="btn btn-info"/>
		</td>
		</table>
		</center>
	</form>
</body>
</html>
