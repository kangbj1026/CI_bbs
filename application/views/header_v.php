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
	<script type="text/javascript" src="/bbs/include/js/httpRequest.js"></script>
	<script>
	// 검색어 입력시 조건
		$(document).ready(function() {
			$("#search_btn").click(function() {
				if ($("#q").val() == '') {
					alert("검색어를 입력하세요!");
					$("#q").focus();
					return false;
				} else {
					// 뷰에서 전송한 주소
					var act = "/bbs/board/lists/board/q/" + $("#q").val() + "/page/1";
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

// 쓰기 페이지에서 확인 버튼을 눌렀을때 조건
//	$(document).ready(function() {
//	 	$("#write_btn").click(function() {
// 			if ($("#input01").val() == '') {
// 				alert('제목을 입력해 주세요.');
// 				$("#input01").focus();
// 				return false;
// 			} else if ($("#input02").val() == '') {
// 				alert('내용을 입력해 주세요.');
// 				$("#input02").focus();
// 				return false;
// 			} else {
// 				$("#write_action").submit();
// 			}
// 		});
// 	});

	// // 데이터를 XMLHttpRequest 객체를 이용해 어떤 주소에 전달하고 가공된 데이터를 받아 특정 함수를 실행
	// function comment_add() {
	// 	let csrf_token = getCookie('csrf_cookie_name');
	// 	// XMLHttpRequest 객체에 전달할 데이터를 생성
	// 	// 데이터는 쿼리스트링 방식으로 생성, 게시글 입력을 위해 테이블 명, 원글 번호가 추가로 필요
	// 	let name = "comment_contents=" + encodeURIComponent(document.com_add.comment_contents.value) + 
	// 		"&csrf_test_name=" + csrf_token + "&table=<?=$this->uri->segment(3)?>&board_id=<?=$this->uri->segment(5)?>";
	// 	sendRequest("/bbs/ajax_board/ajax_comment_add", name, add_action, "POST");
	// }
	
	// function add_action() {
	// 	if ( httpRequest.readyState == 4) {
	// 		if ( httpRequest.status == 200) {
	// 			if ( httpRequest.responseText == 1000) {
	// 				alert("댓글의 내용을 입력하세요.");
	// 			} else if ( httpRequest.responseText == 2000) {
	// 				alert("다시 입력하세요.");
	// 			} else if ( httpRequest.responseText == 9000) {
	// 				alert("로그인하여야 합니다.");
	// 			} else {
	// 				let contents = document.getElementById("comment_area");
	// 				contents.innerHTML = httpRequest.responseText;
					
	// 				let textareas = document.getElementById("input01");
	// 				textareas.value = '';
	// 			}
	// 		} else {
	// 			document.location.reload();
	// 		}
	// 	}
	// }
	
	// function getCookie(name) {
	// 	let nameOfCookie = name + "=";
	// 	let x = 0;
		
	// 	while ( x <= document.cookie.length) {
	// 		let y = (x + nameOfCookie.length);
			
	// 		if (document.cookie.substring(x, y) == nameOfCookie) {
	// 			if (( endOfCookie = document.cookie.indexOf(";", y)) == -1) 
	// 				endOfCookie = document.cookie.length;
				
	// 			return unescape(document.cookie.substring(y, endOfCookie));
	// 		}
			
	// 		x = document.cookie.indexOf(" ", x) + 1;
			
	// 		if ( x == 0) 
			
	// 		break;
	// 	}
	// }

	function comment_add(){
		$(document).ready(function(){
			$("#comment_btn").click(function(){
				console.log($("#input01").val());
				$("#comment_action").submit();
			})
		})
	}
	</script>
</head>

<body>
	<div id="main">
		<header id="header">
			<div class="top">
				<ul>
					<h1><a rel="external" href="/bbs/board/lists/board/"> board 게시판 </a></h1>
				</ul>
			</div>
			<div class="top_right">
				<h2 class="a"> <a class="b" href="/bbs/auth/join"> JOIN </a> </h2>
				<?php
				if (@$this->session->userdata('logged_in') == TRUE) {
					echo "<h3><p>" . $this->session->userdata('username') . " 님</p></h3> <h2><a href='/bbs/auth/logout'> LOG OUT </a></h2>";
				} else {
					echo "<h2><a href='/bbs/auth/login'> LOGIN </a></h2>";
				}
				?>
			</div>
		</header>