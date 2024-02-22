function fullName() {
    firstName = document.getElementById('first_name').value;
    lastName = document.getElementById('last_name').value;
    fullNameField = document.getElementById('full_name');
    fullNameField.value = firstName + ' ' + lastName;
}
