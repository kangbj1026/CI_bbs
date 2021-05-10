<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url("community/include/css/style1.css")?>">
	<title>read</title>
</head>
<body>
<a href="/community/board1/main"> main </a>
<form action="" method="post">
	<table>
		<thead>
			<tr>
				<th> no </th>
				<th> subject </th>
				<th> contents </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th> <?=$view->no?> </th>
				<th> <input type="text" name="subject" value="<?=$view->subject?>"> </th>
				<th> <input type="text" name="contents" value="<?=$view->contents?>s"> </th>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="3"> <input type="submit" value="수정 완료"> </th>
			</tr>
		</tfoot>
	</table>
</form>
</body>
</html>