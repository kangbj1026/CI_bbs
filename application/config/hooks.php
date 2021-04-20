<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
	// $hook['post_controller_constructor'] = array(
	// 	'class'    => 'PreAuthAccessCheck',
	// 	'filename' => 'pre_auth_access.php',
	// 	'filepath' => 'hooks',
	// 	'function' => 'auth',
	// 	'params'   => []
	// );
	
$hook['post_controller_constructor'][] = [
	// class 당신이 호출하고자 하는 클래스의 이름
	'class'    => 'PreAuthAccessCheck',
	// filename 당신의 스크립트(클래스, 함수)를 정의해둔 파일이름
	'filename' => 'pre_auth_access.php',
	// filepath 파일경로(파일명을 제외한 디렉토리경로)
	'filepath' => 'hooks',
	// function 호출하고자 하는 함수의 이름
	'function' => 'auth',
	// 스크립트로 전달하고자하는 파라미터
	'params'   => []
];