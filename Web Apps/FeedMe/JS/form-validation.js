// inputs
const firstName = document.getElementById('fistName');
const lastName = document.getElementById('lastName');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmPassword');
const email = document.getElementById('email');
const username = document.getElementById('username');

// From

const form = document.getElementById('form');

// Validation colors
const green = "#4CAF50";
const red = "#F44336";

function validateFirstName(){
  // check if is empty
  if(checkIfEmpty(firstName)) return; 
  // check if is as only letters
  if(!checkIfOnlyLetters(firstName)) return;
  return true;
}

function checkIfEmpty(field){
  if(isEmpty(field.value)){
    // set field invalid
    setInvalid(field, `${field.name} must not be empty`);
    return true;

  } else {
    // set field valid
    setValid(field);
    return false;
  }
}

function isEmpty(value){
  if(value === '') return true;
  return false;
}

function setInvalid(field, message){
  field.className = 'invalid';
  field.nextElementSibling.innerHTML = message;
  field.nextElementSibling.style.color = red;
}

function setValid(field, message){
  field.className = 'valid';
  field.nextElementSibling.innerHTML = '';
  //field.nextElementSibling.style.color = green;
}

function checkIfOnlyLetters(field){
  if(/^[a-zA-Z ]+$/.test(field.value)){
    setValid(field);
    return true
  } else {
    setInvalid(field, `${field.name} must contain only letters`);

  }
}