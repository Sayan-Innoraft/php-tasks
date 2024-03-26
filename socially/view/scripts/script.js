// Validates if the user putting the same password in 2 times.
// If both passwords match, shows green matching text, else shows red Not
// Matching text.
function validate_password() {
  if ($('#password1').val() === $('#password2').val()) {
    $('.matching').removeClass('none');
    $('.not-matching').addClass('none');
    $('#submit').prop('disabled', false);
  } else {
    $('.matching').addClass('none');
    $('.not-matching').removeClass('none');
    $('#submit').prop('disabled', true);
  }
}
function debounce(func, timeout = 300){
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => { func.apply(this, args); }, timeout);
  };
}
const processChange = debounce(() => validate_password());

// validate password happens on window keyup, but only after
// the user has stopped typing for 250ms.
$('#password2,#password1').on('keyup',processChange);
