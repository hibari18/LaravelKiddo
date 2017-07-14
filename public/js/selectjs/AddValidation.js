function Validation(){
	var divName = document.getElementById('divName');
	var levelName = document.getElementById('levelName');
	var subjCode = document.getElementById('subjCode');
	var subjName = document.getElementById('subjName');

	if (divName.value.length == 0) {
		document.getElementById('head').innerText = "All fields are mandatory.";
		divName.focus();
		return false;
	} else if (divName.value.length == 1) {
		document.getElementById('head').innerText = "      ";
		divName.focus();
		return true;
	} 

	if (inputAlphabet(divName, "* You can enter letters only*")) {
		if (lengthChar(divName, 6,20)) {

		}
	}
			if (inputAlpha(levelName, "* You can enter letters and numbers only *")){
				if (lengthDefine(levelName, 6,20)) {

				}
			}
					if (inputAlphaNumeric(subjCode, "* You can enter letters and numbers only *")){
						if (lengthDef(subjCode, 4,20)) {

						}
					}
							if (inputBet(subjName, "You can enter letters only")){
								if (lengthDeFine(subjName, 6,20)) {
									return true;
								}
							}
	return false;
}

function inputAlphabet(inputtext, alertMsg){
	var Expression = /^[a-z - A-Z]+$/;
	if (divName.value.length == 0) {
		document.getElementById('p1').innerText = "You must answer all fields";
		divName.focus();
		return false;
	}else if (divName.value.length == 1) {
		document.getElementById('p1').innerText = "      ";
		divName.focus();
		return false;
	} 
	if (inputtext.value.match(Expression)){
		return true;
	}
	else{
		document.getElementById('p1').innerText = alertMsg;
		inputtext.focus();
		return false;
	}
}

function inputAlpha(inputtext, alertMsg){
	var Expression = /^[0-9a-z A-Z]+$/;
	if (levelName.value.length == 0) {
		document.getElementById('p2').innerText = "You must answer all fields";
		levelName.focus();
		return false;
	}else if (levelName.value.length == 1) {
		document.getElementById('p2').innerText = "      ";
		levelName.focus();
		return false;
	} 
	if (inputtext.value.match(Expression)){
		return true;
	}
	else{
		document.getElementById('p2').innerText = alertMsg;
		inputtext.focus();
		return false;
	}
}

function inputBet(inputtext, alertMsg){
	var Expression = /^[a-z A-Z]+$/;
	if (subjName.value.length == 0) {
		document.getElementById('p3').innerText = "You must answer all fields";
		subjName.focus();
		return false;
	}else if (subjName.value.length == 1) {
		document.getElementById('p3').innerText = "      ";
		subjName.focus();
		return false;
	} 
	if (inputtext.value.match(Expression)){
		return true;
	}
	else{
		document.getElementById('p3').innerText = alertMsg;
		inputtext.focus();
		return false;
	}
}

function inputAlphaNumeric(inputtext, alertMsg){
	var alphaExp = /^[0-9 a-zA-Z]+$/;
		if (subjCode.value.length == 0) {
		document.getElementById('p4').innerText = "You must answer all fields";
		subjCode.focus();
		return false;
	}else if (subjCode.value.length == 1) {
		document.getElementById('p4').innerText = "      ";
		return false;
	} 
	if (inputtext.value.match(alphaExp)){
		return true;
	}
	else{
		document.getElementById('p4').innerText = alertMsg;
		inputtext.focus();
		return false;
	}
}

function lengthDefine(inputtext, min, max) {
	var uInput = inputtext.value;
	if (uInput.length >= min && uInput.length <= max) {
	return true;
	} else {
		document.getElementById('p2').innerText = "* Please enter atleast 6 characters. *"; // This segment displays the validation rule for username
		inputtext.focus();
		return false;
	}
}

function lengthChar(inputtext, min, max) {
	var uInput = inputtext.value;
	if (uInput.length >= min && uInput.length <= max) {
	return true;
	} else {
		document.getElementById('p1').innerText = "* Please enter atleast 6 characters. *"; // This segment displays the validation rule for username
		inputtext.focus();
		return false;
	}
}

function lengthDef(inputtext, min, max) {
	var uInput = inputtext.value;
	if (uInput.length >= min && uInput.length <= max) {
	return true;
	} else {
		document.getElementById('p4').innerText = "* Please enter atleast 4 characters. *"; // This segment displays the validation rule for username
		inputtext.focus();
		return false;
	}
}

function lengthDeFine(inputtext, min, max) {
	var uInput = inputtext.value;
	if (uInput.length >= min && uInput.length <= max) {
	return true;
	} else {
		document.getElementById('p3').innerText = "* Please enter atleast 6 characters. *"; // This segment displays the validation rule for username
		inputtext.focus();
		return false;
	}
}