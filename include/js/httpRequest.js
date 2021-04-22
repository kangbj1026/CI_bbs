// 적용하기 전에 매번 반복되는 XMLHttpRequest 객체를 사용하여 코드를 작성하기 번거롭기 때문에 해당 부분을 httpRequest.js 파일로 만들어 사용
function getXMLHttpRequest() {
	if (window.ActivXObject) {
		try {
			return new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				return ActiveXObject("Microsoft.XMLHTTP");
			} catch (e1) {
				return null;
			}
		}
	} else if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else {
		return null;
	}
}

let httpRequest = null;

function sendRequest(url, params, callback, method) {
	httpRequest = getXMLHttpRequest();
	let httpMethod = method ? method : 'GET';

	if (httpMethod != 'GET' && httpMethod != 'POST') {
		httpMethod = 'GET';
	}

	let httpParams = (params == null || params == '') ? null : params;
	let httpUrl = url;

	if (httpMethod == 'GET' && httpParams != null) {
		httpUrl = httpUrl + "?" + httpParams;
	}

	httpRequest.open(httpMethod, httpUrl, true);
	httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	httpRequest.onreadystatechange = callback;
	httpRequest.send(httpMethod == 'POST' ? httpParams : null);
}