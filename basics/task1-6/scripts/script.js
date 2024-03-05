/**
 * Concatenates first name, last name and fills the full name field.
 */
function setFullName() {
  firstName = document.getElementById('first_name').value;
  lastName = document.getElementById('last_name').value;
  fullNameField = document.getElementById('full_name');
  fullNameField.value = firstName + ' ' + lastName;
}

/**
 * Displays the suer input image file on webpage.
 */
var openFile = function(file) {
  var input = file.target;
  var reader = new FileReader();
  reader.onload = function(){
    var dataURL = reader.result;
    var output = document.getElementById('output');
    output.style.display = 'block';
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};
