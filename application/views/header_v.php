<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title> BBS </title>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?=base_url("bbs/include/css/style.css")?>">
	<script type="text/javascript" src="<?=base_url("bbs/include/js/jquery-3.6.0.min.js")?>"></script>
	<script>
		$(document).ready(function() {
			$("#search_btn").click(function() {
				if ($("#q").val() == '') {
					alert("검색어를 입력하세요!");
					$("#q").focus();
					return false;
				} else {
					// 뷰에서 전송한 주소
					let act = "/bbs/board/lists/board/q/" + $("#q").val() + "/page/1";
					// $("#폼아이디").attr('속성', url)
					$("#bd_search").attr('action', act).submit();
				}
			});
		});
		function board_search_enter(form) {
			// window.event.keyCode - 자바 스크립트 이벤트 키 코드
			let keycode = window.event.keyCode;
			if (keycode == 13) // 13 = Enter
				$("#search_btn").click();
		}

//		$(document).ready(function() {
//			$("#write_btn").click(function() {
//				if ($("#input01").val() == '') {
//					alert('제목을 입력해 주세요.');
//					$("#input01").focus();
//					return false;
//				} else if ($("#input02").val() == '') {
//					alert('내용을 입력해 주세요.');
//					$("#input02").focus();
//					return false;
//				} else {
//					$("#write_action").submit();
//				}
//			});
//		});
	</script>
</head>

<body>
	<div id="main">
		<header id="header">
			<div class="top">
				<ul>
					<h1><a rel="external" href="/bbs/<?=$this->uri->segment(1);?>/lists/<?=$this->uri->segment(3);?>"> board 게시판 </a></h1>
				</ul>
			</div>
			<div class="top_right">
				<!-- <h2><a rel="external" href="/bbs/<?=$this->uri->segment(1);?>/lists/<?=$this->uri->segment(3);?>"> Login </a></h2>			 -->
			</div>
		</header>