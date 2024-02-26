/**
 *
 */
function fullName() {
    let firstName = document.getElementById('first_name').value;
    let lastName = document.getElementById('last_name').value;
    let fullNameField = document.getElementById('full_name');
    fullNameField.value = firstName + ' ' + lastName;
}
