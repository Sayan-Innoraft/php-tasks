// Validates if the user putting the same password in 2 times.
// If both passwords match, shows green matching text, else shows red Not
// Matching text.
$('form').validate();
$('#password1, #password2').on('keyup', function() {
  if ($('#password1').val() === $('#password2').val()) {
    $('#message').html('Matching').css('color', 'green');
    $('#submit').prop('disabled', false);
  } else {
    $('#message').html('Not Matching').css('color', 'red');
    $('#submit').prop('disabled', true);
  }
});