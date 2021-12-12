function printError(elemID, errMsg){
	document.getElementById(elemID).innerHTML = errMsg;
}

function checkType() {

	var test = true;
	document.addEventListener('keydown', function(event) {
		
		if (event.key === '4') {
			if (test == true){	
			test = false;
			document.getElementById('ccType').innerHTML = "<img src='visa.jpg'>";
			this.removeEventListener('keydown');
			
			return;
			
	} 
		} else if(event.key === '5'){
			if(test == true) {
			test = false;
			document.getElementById('ccType').innerHTML = "<img src='masterc.jpg'>";
			this.removeEventListener('keydown');

			return;
		}	
		}else if(event.key === '6'){
			if(test == true) {
			test = false;
			document.getElementById('ccType').innerHTML = "<img src='disco.jpg'>";
			this.removeEventListener('keydown');

			return;
		}	
		}else if(event.key === '3'){
			if(test == true) {
			test = false;
			document.getElementById('ccType').innerHTML = "<img src='amer.jpg'>";
			this.removeEventListener('keydown');

			return;
		}	
		}else if(event.keyCode == 8){
			test = true;

		} else {
			test = false;
			this.removeEventListener('keydown');
			return;
		}
	});



}


	



/*original code I created to test input:

var test = true;
document.addEventListener('keydown', function(event) {
	
	if (event.key === '4') {
		if (test == true){
		document.getElementById('ccType').innerHTML = "VISA";
		this.removeEventListener('keydown');
		test = false;
		
} 
	} else {
		test = false;
		this.removeEventListener('keydown');
		return;
	}
});



*/


function formValidation(){
	var card = document.A3Form.card.value;
	var name = document.A3Form.name.value;
	var cvv = document.A3Form.cvv.value;

	var cardError = true;
	var nameError = true;
	var cvvError = true;


if (card == ""){
	cardError = true;
	printError("cardError", "Please Enter a Valid Card Number");
} else {
	var regexp = /^[0-9\s]+$/;
	if (regexp.test(card) === false){
		printError("cardError", "Enter a valid Card Number!");
	} else {
		printError("cardError", "");
		cardError = false;
	}
}

if (name == ""){
	nameError = true;
	printError("nameError", "Please Enter a Valid Name");
} else {
	var regexp = /^[a-zA-z\s]+$/;
	if (regexp.test(name) === false){
		printError("nameError", "Enter a valid Name!");
	} else {
		printError("nameError", "");
		nameError = false;
	}
}

if (cvv == ""){
	printError("cvvError", "Please Enter a Valid CVV/CVC");
} else {
	var regexp = /^[0-9\s]+$/;
	if (regexp.test(cvv) === false){
		printError("cvvError", "Enter a valid CVV/CVC!");
	} else {
		printError("cvvError", "");
		cvvError = false;
	}
}

if((cardError && nameError && cvvError) == true){
	window.alert("You Forgot to Fill Out Field(s): Card Number, Name and CVV/CVC");
	return false;
	
}  if (cardError && nameError == true){
window.alert("You Forgot to Fill Out Field(s): Card Number and Name");
	return false;

} else if (cardError && cvvError == true){
window.alert("You Forgot to Fill Out Field(s): Card Number and CVV/CVC");
	return false;

} else if (nameError && cvvError == true){
window.alert("You Forgot to Fill Out Field(s): Name and CVV/CVC");
	return false;

} else if (cardError == true){
	window.alert("You Forgot to Fill Out Field(s): Card Number");
	return false;
} else if (nameError == true){
	window.alert("You Forgot to Fill Out Field(s): Name");
	return false;
} else if (cvvError == true){
	window.alert("You Forgot to Fill Out Field(s): CVV");
	return false;
} else {
	
	return true;
}
}


