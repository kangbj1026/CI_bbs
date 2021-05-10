<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?=base_url("community/include/css/style1.css")?>">
	<script type="text/javascript" src="<?=base_url("community/include/js/jquery-3.6.0.min.js")?>"></script>
	<title> CI </title>
</head>
<body>
<a href="/community/board1/main"> main </a>
	<div id="main">
		<form action="" method="post">
		제목 <input type="text" name="subject">
		내용 <input type="text" name="contents">
		<input type="submit" value=" 전송 ">
		</form>

		<table>
			<thead>
				<tr>
					<th> no </th>
					<th> subject </th>
					<th> contents </th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($list as $lt) { ?>
				<tr>
					<th> <?=$lt->no?> </th>
					<th> <a href="../board1/read/<?=$lt->no?>"> <?=$lt->subject?> </a> </th>
					<th> <?=$lt->contents?> </th>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>