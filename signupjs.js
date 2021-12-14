function validate() {
    // checking and wrong for empty feilds in first name  
    let fnameTest = document.myForm.fname.value.search(/[a-zA-Z]/g)
    if (document.myForm.fname.value == "" || fnameTest == -1) {
        alert("First name can only be letters");
        document.myForm.fname.focus();
        return false;
    }

    // checking and wrong for empty feilds in last name  
    let lnameTest = document.myForm.lname.value.search(/[a-zA-Z]/g)
    if (document.myForm.lname.value == "" || lnameTest == -1) {
        alert("First name can only be letters");
        document.myForm.lname.focus();
        return false;
    }

    // checking and wrong for empty feilds in email 
    let emailTest = document.myForm.email.value.search(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@(ashesi.edu.gh)$/)
    if (document.myForm.email.value == "" || emailTest == -1) {
        alert("Enter your Ashesi email!");
        document.myForm.email.focus();
        return false;
    }


    var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

}