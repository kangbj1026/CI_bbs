<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url("community/include/css/style1.css")?>">
	<script type="text/javascript" src="<?=base_url("community/include/js/jquery-3.6.0.min.js")?>"></script>
	<title>read</title>
	<script>
		$(document).ready(function(){
			$("#delete_btn").click(function(){
				if (confirm('정말 삭제하시겠습니까?')) {
					alert(' 삭제 처리 되었습니다.');
				} else {
					alert(' 취소 되었습니다.');
					return false;
				}
			})
		})
	</script>
</head>
<body>
<a href="/community/board1/main"> main </a>
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
				<th> <?=$view->subject?> </th>
				<th> <?=$view->contents?> </th>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="2"> <a href="../modify1/<?=$view->no?>"> 수정하기 </a></th>
				<th colspan="1"> <a href="../delete1/<?=$view->no?>" id="delete_btn"> 삭제 </a></th>
			</tr>
		</tfoot>
	</table>
</body>
</html>