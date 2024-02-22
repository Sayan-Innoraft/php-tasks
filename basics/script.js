function fullName() {
    // Get the values from the first name and last name fields.
    firstName = document.getElementById('first_name').value;
    lastName = document.getElementById('last_name').value;
    // Add the values and display it on full name field.
    fullNameField = document.getElementById('full_name');
    fullNameField.value = firstName + ' ' + lastName;
}
